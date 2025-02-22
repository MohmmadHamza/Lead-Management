<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\DomainClass;
use App\Models\DomainClassType;
use App\Models\Priority;
use App\Models\State;
use App\Models\Student;
use Illuminate\Http\Request;
use Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Request as FacadesRequest;
class StudentAdmission extends Controller
{

    public function __construct()
    {

        $this->checkAuthorization(auth()->user(), FacadesRequest::route()->getName());
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::all();
        $domainClasses = DomainClass::all();
        return view("admin.student_admission.index",compact('companies','domainClasses'))->with('title', 'Admission Detail');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $states = State::all();
           
            $domains = DomainClass::orderBy('sequence_number', 'asc')->where('status', 1)->get();
            $priorities = Priority::orderBy('sequence_number', 'asc')->where('status', 1)->get();
            $companies = Company::orderBy('created_at', 'asc')->where('status', 'active')->get();
            return view("admin.student_admission.form", compact( 'states', 'priorities', 'companies', 'domains'))->with('title', 'Student Admission');
        } catch (\Throwable $e) {
            \Log::error('Failed to load edit form for student ID '  . $e->getMessage(), ['exception' => $e]);
            return redirect()->back()->withErrors('Failed to load edit form: ' . $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
           
            $validated = $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:students,email',
                'mobile' => 'required|unique:students,mobile',
                'parents_mobile' => 'required',
                'qualification' => 'required',
                'college' => 'required',
                'gender' => 'required',
                'address' => 'required',
                'city' => 'required',
                'domain' => 'required',
                'admission_date' => 'required|date',
                'student_profile' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'resume' => 'nullable|mimes:pdf,doc,docx|max:2048',
               
            ]);
    
            if (auth()->user()->role != 'super-admin') {
                if (auth()->user()->role == 'admin') {
                    $company = Company::where('user_id', auth()->user()->id)->first();
                    $validated['company_id'] = $company->id;
                } else {
                    $validated['company_id'] = auth()->user()->company_id;
                    $validated['created_by'] = auth()->user()->id;
                }

            }
           
            $validated['followup_status'] = 'Admission';

            $validated['created_by'] = auth()->user()->id;
    
           
            if ($request->hasFile('student_profile')) {
                $file = $request->file('student_profile');
                $filename = uniqid() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('student_profile', $filename, 'public');
                $validated['student_profile'] = $path;
            }
    
           
            if ($request->hasFile('resume')) {
                $file = $request->file('resume');
                $filename = uniqid() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('resume', $filename, 'public');
                $validated['resume'] = $path;
            }
    
           
            Student::create($validated);
    
            return redirect()->route('admission.index')->with('success', 'Student Admission Successfully.');
        } catch (\Throwable $e) {
            \Log::error('Failed to store student: ' . $e->getMessage(), ['exception' => $e]);
            return redirect()->back()->withErrors('Failed to store student: ' . $e->getMessage())->withInput();
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    public function list(Request $request)
    {
        $loggedInUser = auth()->user();
        $student = Student::select('id', 'name', 'email', 'mobile','city','domain', 'followup_status','admission_date','company_id', 'created_by')
        ->with('company','createdBy','domainClass')
        ->where('followup_status', 'Admission');

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
            ->editColumn('admission_date', function ($student) {
                return $student->admission_date->format('d-m-Y');
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
                return ucfirst($student->createdBy->name ?? 'N/A') ;
            })

            ->addColumn('domain', function ($student) {
                return ucfirst($student->domainClass->name ?? 'N/A') ;
            })

         

            ->addColumn('actions', function ($student) {
                $links = [];

                if (auth()->user()->can('student-fees.edit')) {
                    $links[] = [
                        'title' => 'Student Fees',
                        'link' => route('student-fees.edit', $student->id),
                        'icon' => 'fa fa-calendar',
                    ];

                }
                if (auth()->user()->can('admission.edit')) {
                    $links[] = [
                        'title' => 'Edit',
                        'link' => route('admission.edit', $student->id),
                        'icon' => 'fa-edit',
                    ];
                }

                if (auth()->user()->can('admission.delete')) {
                    $links[] = [
                        'title' => 'Delete',
                        'link' => '',
                        'icon' => 'fa-trash',
                        'onclick' => "confirmDelete('" . route('admission.destroy', $student->id) . "')",
                    ];
                }

                return [
                    'id' => $student->id,
                    'links' => $links,
                ];
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
    


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $student = Student::find($id);
            $states = State::all();
        
            $domains = DomainClass::orderBy('sequence_number', 'asc')->where('status', 1)->get();
            $priorities = Priority::orderBy('sequence_number', 'asc')->where('status', 1)->get();
            $companies = Company::orderBy('created_at', 'asc')->where('status', 'active')->get();
            return view("admin.student_admission.form", compact('student', 'states', 'priorities', 'companies', 'domains'))->with('title', 'Student Admission');
        } catch (\Throwable $e) {
            \Log::error('Failed to load edit form for student ID ' . $id . ': ' . $e->getMessage(), ['exception' => $e]);
            return redirect()->back()->withErrors('Failed to load edit form: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:students,email,' . $id,
                'mobile' => 'required',
                'parents_mobile' => 'required',
                'qualification' => 'required',
                'college' => 'required',
                'gender' => 'required',
                'address' => 'required',
                'city' => 'required',
                'domain' => 'required',
                'admission_date' => 'required|date',
                'student_profile' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'resume' => 'nullable|mimes:pdf,doc,docx|max:2048',
              

            ]);
            $student = Student::find($id);
            
            if (!$student) {
                abort(404, 'Student not found');
            }

            $validated['followup_status'] = 'Admission';
            if ($request->hasFile('student_profile')) {
                
                if ($student->student_profile && Storage::disk('public')->exists($student->student_profile)) {
                    Storage::disk('public')->delete($student->student_profile);
                }
            
                
                $file = $request->file('student_profile');
                $filename = uniqid() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('student_profile', $filename, 'public');
                $validated['student_profile'] = $path;
            }
            
            if ($request->hasFile('resume')) {
                if ($student->resume && Storage::disk('public')->exists($student->resume)) {
                    Storage::disk('public')->delete($student->resume);
                }
            
                
                $file = $request->file('resume');
                $filename = uniqid() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('resume', $filename, 'public');
                $validated['resume'] = $path; 
            }
            
    
            $student->update($validated);

            return redirect()->route('admission.index')->with('success', 'Student Admission Successfully.');

        }catch (\Throwable $e) {
            \Log::error('Failed to update student: ' . $e->getMessage(), ['exception' => $e]);
            return redirect()->back()->withErrors('Failed to update student: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
