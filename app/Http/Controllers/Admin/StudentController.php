<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\DomainClass;
use App\Models\FollowUp;
use App\Models\Priority;
use App\Models\State;
use App\Models\Student;
use App\Models\StudentFee;
use App\Models\StudentFeeInstallment;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;

use Illuminate\Support\Facades\Request as FacadesRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {

        $this->checkAuthorization(auth()->user(), FacadesRequest::route()->getName());
    }
    public function index()
    {
        $authUser = Auth::user();
        
        $companies = Company::all();
        if ($authUser->role === 'admin') {
          
            $companie = Company::where('user_id',$authUser->id)->first();
          
            $users = User::where('company_id', $companie?->id)->get();
           
         
        } else {
            $users = User::all();
        }

        $domainClasses = DomainClass::all();
        return view("admin.student.index", compact('companies', 'domainClasses', 'users'))->with('title', 'Student');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function list(Request $request)
    {
        $loggedInUser = auth()->user();
        $student = Student::select('id', 'name', 'email', 'mobile', 'city', 'domain', 'followup_status', 'message', 'follow_up_date', 'created_at', 'company_id', 'created_by')->with('company', 'createdBy', 'domainClass');

        if (isset($request->followup_status) && $request->followup_status != "") {
            $student->where("followup_status", $request->followup_status);
        }


        if ($request->start_date) {
            $student->whereDate('follow_up_date', '>=', $request->start_date);
        }

        if ($request->end_date) {
            $student->whereDate('follow_up_date', '<=', $request->end_date);
        }

        if (isset($request->company_name) && $request->company_name != "") {
            $student->where("company_id", $request->company_name);
        }

        if (isset($request->domain) && $request->domain != "") {
            $student->where("domain", $request->domain);
        }

        return DataTables::of($student)
            ->editColumn('created_at', function ($student) {
                return $student->created_at->format('d-m-Y h:i A');
            })
            ->editColumn('followup_status', function ($student) {
                if ($student->followup_status == 'Follow-up') {
                    return '<span class="badge badge-success">Follow-up</span>';
                } else {
                    return '<span class="badge badge-info">Admission</span>';
                }
            })
            ->editColumn('name', function ($student) {
                return ucfirst($student->name);
            })
            ->addColumn('company_name', function ($student) use ($loggedInUser) {
                if ($loggedInUser->role == 'super-admin') {
                    return $student->company->company_name ?? 'N/A';
                }
                // return null;
            })
            ->addColumn('created_by', function ($student) {
                return ucfirst($student->createdBy->name ?? 'N/A');
            })

            ->addColumn('domain', function ($student) {
                return ucfirst($student->domainClass->name ?? 'N/A');
            })



            ->addColumn('actions', function ($student) {
                $links = [];

                if (auth()->user()->can('student.edit')) {
                    $links[] = [
                        'title' => 'Edit',
                        'link' => route('student.edit', $student->id),
                        'icon' => 'fa-edit',
                    ];
                }

                if (auth()->user()->can('admission.edit')) {
                    $links[] = [
                        'title' => 'Admission',
                        'link' => '',
                        'icon' => 'fa fa-check-circle text-orange-peel',
                        'onclick' => "confirmAdmission('" . route('admission.edit', $student->id) . "')",
                    ];
                }


                if (auth()->user()->can('student.delete')) {
                    $links[] = [
                        'title' => 'Delete',
                        'link' => '',
                        'icon' => 'fa-trash',
                        'onclick' => "confirmDelete('" . route('student.destroy', $student->id) . "')",
                    ];
                }

                return [
                    'id' => $student->id,
                    'links' => $links,
                ];
            })
            ->rawColumns(['actions', 'followup_status'])
            ->make(true);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        // Validate the incoming request
        $request->validate([
            'student_ids' => 'required|string',
            'user' => 'required|exists:users,id',
            'company' => 'nullable|exists:company,id',
        ]);

        try {
            $studentIds = explode(',', $request->input('student_ids'));

            // Retrieve students and their follow-ups
            $students = Student::whereIn('id', $studentIds)->get();
            $followUps = FollowUp::whereIn('student_id', $studentIds)->get();

            $studentFees = StudentFee::whereIn('student_id', $studentIds)->get();
            $studentInstallments = StudentFeeInstallment::whereIn('student_fee_id', $studentFees->pluck('id')->toArray())->get();

    

            // Update students table
            $studentUpdateData = [
                'created_by' => $request->input('user'),
                'updated_at' => now(),
            ];
            if ($request->filled('company')) {
                $studentUpdateData['company_id'] = $request->input('company');
            }

            \DB::table('students')
                ->whereIn('id', $studentIds)
                ->update($studentUpdateData);

            // Update follow-ups table
            foreach ($followUps as $followUp) {
                $followUp->update([
                    'created_by' => $request->input('user'),
                    'updated_by' => $request->input('user'),
                    'company_id' => $request->filled('company') ? $request->input('company') : $followUp->company_id,
                ]);
            }

            foreach ($studentFees as $fee) {
                $fee->update([
                    'created_by' => $request->input('user'),
                    'company_id' => $request->filled('company') ? $request->input('company') : $fee->company_id,
                ]);
            }

            foreach ($studentInstallments as $installment) {
                $installment->update([
                    'created_by' => $request->input('user'),
                    'company_id' => $request->filled('company') ? $request->input('company') : $installment->company_id,
                ]);
            }
    



            return redirect()->back()->with('success', 'Students, follow-ups, domain classes, and priorities updated successfully.');
        } catch (\Exception $e) {
            // Handle errors and redirect back with error message
            return redirect()->back()->with('error', 'An error occurred while updating records: ' . $e->getMessage());
        }
    }





    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $states = State::all();
        $domains = DomainClass::orderBy('sequence_number', 'asc')->where('status', 1)->get();
        $priorities = Priority::orderBy('sequence_number', 'asc')->where('status', 1)->get();
        $companies = Company::orderBy('created_at', 'asc')->where('status', 'active')->get();
        return view("admin.student.form", compact('student', 'states', 'companies', 'domains', 'priorities'))->with('title', 'Student Edit');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
       
        try {
            $validated = $request->validate([
                'name' => 'required',
                'email' => 'nullable|email',
                'mobile' => [
                    'required',
                    Rule::unique('students', 'mobile')->ignore($student->id),
                ],
                'gender' => 'required',
                'city' => 'required',
                'domain' => 'required',
                'priority_id' => 'required',
                'follow_up_date' => 'required',
                'message' => 'required',
                'state' => 'required',
                

            ]);

           
            $student->update($validated);

            return redirect()->route('student.index')->with('success', 'Student Updated Successfully');
        } catch (\Throwable $e) {
            \Log::error('Failed to update Student: ' . $e->getMessage(), ['exception' => $e]);
            return redirect()->back()->withErrors('Failed to update Student: ' . $e->getMessage())->withInput();
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        try {
            // Ensure the student exists
            if (!$student) {
                return response()->json(['message' => 'Student not found.'], 404);
            }

            $student->delete();
            return response()->json(['message' => 'Student deleted successfully.'], 200);
        } catch (\Throwable $e) {

            \Log::error('Failed to delete student: ' . $e->getMessage(), ['exception' => $e]);

            return response()->json(['message' => 'Failed to delete student: ' . $e->getMessage()], 500);
        }
    }

    public function destroyMany(Request $request)
    {


        try {

            $studentIds = $request->input('Checkboxes');
            Student::whereIn('id', $studentIds)->delete();
            return redirect()->route('student.index')->with('error', 'Student deleted successfully.');
        } catch (\Throwable $e) {

            \Log::error('Failed to delete student: ' . $e->getMessage(), ['exception' => $e]);

            return redirect()->back()->withErrors(['Failed to delete student: ' . $e->getMessage()]);
        }
    }


}
