<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FollowupRequest;
use App\Models\Priority;
use App\Models\State;
use App\Models\DomainClass;
use App\Models\Student;
use App\Models\FollowUp;
use App\Models\Company;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Validation\Rule;

class FollowUpController extends Controller
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
        try {
            $students = Student::with(['followups', 'domainClass', 'priority', 'createdby'])
            ->where('followup_status', '!=', 'Admission')
                ->get();


            $organizedFollowUps = [
                'today' => [],
                'upcoming' => [],
                'pending' => [],
            ];

            $prioritys = Priority::all();

            $domains = DomainClass::all();
            foreach ($students as $student) {

                $firstFollowUp = [
                    'date' => Carbon::parse($student->follow_up_date)->format('d F, Y'),
                    'original_date' => $student->follow_up_date,
                    'message' => $student->message,
                    'created_at' => Carbon::now(),
                ];



                $allFollowUps = $student->followups->map(function ($followup) {
                    return [
                        'date' => Carbon::parse($followup->follow_up_date)->format('d F, Y'),
                        'original_date' => $followup->follow_up_date,
                        'message' => $followup->message,
                        'created_at' => $followup->created_at,
                    ];
                });

                $allFollowUps->prepend($firstFollowUp);

                $isPlacedInCategory = false;

                $lastFollowUp = $allFollowUps->last();



                $lastFollowUpDate = Carbon::parse($lastFollowUp['original_date']);

                if (!$isPlacedInCategory) {
                    if ($lastFollowUpDate->isToday()) {

                        $organizedFollowUps['today'][] = [
                            'student' => $student,
                            'followUps' => $allFollowUps,
                            'lastFollowUpDate' => $lastFollowUpDate,
                        ];
                        $isPlacedInCategory = true;
                    } elseif ($lastFollowUpDate->isFuture()) {

                        $organizedFollowUps['upcoming'][] = [
                            'student' => $student,
                            'followUps' => $allFollowUps,
                            'lastFollowUpDate' => $lastFollowUpDate,
                        ];
                        $isPlacedInCategory = true;
                    } elseif ($lastFollowUpDate->isPast()) {
                        $organizedFollowUps['pending'][] = [
                            'student' => $student,
                            'followUps' => $allFollowUps,
                            'lastFollowUpDate' => $lastFollowUpDate,
                        ];
                        $isPlacedInCategory = true;
                    }
                }
            }


            foreach ($organizedFollowUps as $key => $followUps) {
                $organizedFollowUps[$key] = collect($followUps)->sortBy('lastFollowUpDate')->values()->all();
            }
            return view('admin.follow_up.index', [
                'title' => 'Follow Up',
                'organizedFollowUps' => $organizedFollowUps,
                'prioritys' => $prioritys,
                'domains' => $domains,


            ]);
        } catch (\Throwable $e) {
            \Log::error('Failed to load follow-ups: ' . $e->getMessage(), ['exception' => $e]);
            return redirect()->back()->withErrors('Failed to load follow-ups: ' . $e->getMessage());
        }
    }






    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Auth::user()->role === 'admin') {
        return abort(404);
        }
        try {
            $states = State::all();
            $domains = DomainClass::orderBy('sequence_number', 'asc')->where('status', 1)->get();
            $priorities = Priority::orderBy('sequence_number', 'asc')->where('status', 1)->get();
            $companies = Company::orderBy('created_at', 'asc')->where('status', 'active')->get();
            return view('admin.follow_up.form', compact('states', 'domains', 'priorities', 'companies'))->with('title', 'Create Follow Up');
        } catch (\Throwable $e) {
            \Log::error('Failed to load create form: ' . $e->getMessage(), ['exception' => $e]);
            return redirect()->back()->withErrors('Failed to load create form: ' . $e->getMessage());
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
                'email' => 'nullable|email',
                'mobile' => 'required|unique:students,mobile',
                'gender' => 'nullable',
                'city' => 'required',
                'domain' => 'required',
                'message' => 'required',
                'priority_id' => 'required',
                'follow_up_date' => 'required',
                'company_id' => 'nullable',

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
         

            $validated['created_by'] = auth()->user()->id;

        

            $student = Student::create($validated);
         

            return redirect()->route('follow_up.index')->with('success', 'Follow Up Created Successfully');
        } catch (\Throwable $e) {
            \Log::error('Failed to create follow-up: ' . $e->getMessage(), ['exception' => $e]);
            return redirect()->back()->withErrors('Failed to create follow-up: ' . $e->getMessage())->withInput();
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
       
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

            return view('admin.follow_up.form', compact('student', 'states', 'domains', 'priorities', 'companies'))->with('title', 'Edit Follow Up');
        } catch (\Throwable $e) {
            \Log::error('Failed to load edit form for student ID ' . $id . ': ' . $e->getMessage(), ['exception' => $e]);
            return redirect()->back()->withErrors('Failed to load edit form: ' . $e->getMessage());
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {


        try {
            $validated = $request->validate([
                'name' => 'required',
                'email' => 'nullable|email',
                'mobile' => [
                    'required',
                    Rule::unique('students', 'mobile')->ignore($id),
                ],
                'gender' => 'nullable',
                'city' => 'required',
                'domain' => 'required',
                'priority_id' => 'required',
           

            ]);

            $student = Student::find($id);

            $student->update($validated);


            $followUpDate = Carbon::parse($request->follow_up_date);

            $currentDate = Carbon::today();

            if ($followUpDate->isToday()) {
                $status = 'today';
            } elseif ($followUpDate->isFuture()) {
                $status = 'upcoming';
            } else {
                $status = 'pending';
            }

            if (auth()->user()->role != 'super-admin') {
                if (auth()->user()->role == 'admin') {
                    $company = Company::where('user_id', auth()->user()->id)->first();
                    $validated['company_id'] = $company->id;
                } else {
                    $validated['company_id'] = auth()->user()->company_id;
                    $validated['created_by'] = auth()->user()->id;
                }

            }
            $follow_up = FollowUp::create([
                'student_id' => $student->id,
                'message' => $request->message,
                'follow_up_date' => $request->follow_up_date,
                'follow_up_time' => now()->format('H:i:s'),
                'follow_up_status' => $status,
                'company_id' => $validated['company_id'] ?? $student->company_id,
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id,
            ]);

            return redirect()->route('follow_up.index')->with('success', 'Follow Up Updated Successfully');
        } catch (\Throwable $e) {
            \Log::error('Failed to update follow-up: ' . $e->getMessage(), ['exception' => $e]);
            return redirect()->back()->withErrors('Failed to update follow-up: ' . $e->getMessage())->withInput();
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {

            $student = Student::find($id);

            FollowUp::where('student_id', $student->id)->delete();

            if (!$student) {
                abort(404, 'Student not found');
            }
            $student->delete();

            return redirect()->back()->with('success', 'Student deleted successfully.');
        } catch (\Throwable $e) {
            \Log::error('Failed to delete student with ID ' . $id . ': ' . $e->getMessage(), ['exception' => $e]);
            return redirect()->back()->withErrors('Failed to delete student: ' . $e->getMessage());
        }


    }
}
