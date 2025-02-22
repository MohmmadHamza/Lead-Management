<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CalendarEvent;
use App\Models\Company;
use App\Models\DomainClass;
use App\Models\Student;
use App\Models\StudentFee;
use App\Models\StudentFeeInstallment;
use Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Validator; 
use Yajra\DataTables\DataTables;

class StudentFeesController extends Controller
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
            $companies = Company::all();
            return view('admin.student_fees.index', compact( 'companies'))->with('title', 'Student Fees');
        } catch (\Throwable $e) {
            \Log::error('Failed to load Student-Fees index: ' . $e->getMessage(), ['exception' => $e]);
            return redirect()->back()->withErrors('Failed to load Student-Fees: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            
            $students = Student::with('domainClass')->get();

            // Get all student IDs that already exist in the student_fees table
            $studentIdsWithFees = StudentFee::pluck('student_id')->toArray();
    
            // Filter out students whose ID already exists in the student_fees table
            $students = $students->filter(function ($student) use ($studentIdsWithFees) {
                return !in_array($student->id, $studentIdsWithFees);
            });

        

            $domains = DomainClass::where('status', 1)->orderBy('sequence_number')->get();
            $companies = Company::where('status', 'active')->orderBy('created_at')->get();
    
            return view("admin.student_fees.form", compact('companies', 'domains', 'students'))
                ->with('title', 'Fees Collection');
    
        } catch (\Throwable $e) {
            return redirect()->back()->withErrors('Error: ' . $e->getMessage());
        }
    }
    


    public function list(Request $request)
    {
        $loggedInUser = auth()->user();
    
        $students = StudentFee::with(['student', 'createdBy', 'domainClass','company'])
            ->select('id', 'student_id', 'domain_class_id', 'total_fees', 'discounted_fees', 'paid_amount', 'remaining_amount', 'payment_type', 'created_at','discounted_amount', 'created_by','company_id');
    

            if ($request->start_date) {
                $students->whereDate('created_at', '>=', $request->start_date);
            }
    
            if ($request->end_date) {
                $students->whereDate('created_at', '<=', $request->end_date);
            }
    
            if (isset($request->company_name) && $request->company_name != "") {
                $students->where("company_id", $request->company_name);
            }

            if (isset($request->payment_type) && $request->payment_type != "") {
                $students->where("payment_type", $request->payment_type);
            }
    
            
        return DataTables::of($students)
            ->editColumn('created_at', function ($student) {
                return $student->created_at ? $student->created_at->format('d-m-Y h:i A') : 'N/A';
            })
    
            ->addColumn('student_name', function ($student) {
                return ucfirst($student->student->name ?? 'N/A');
            })
    
            ->addColumn('email', function ($student) {
                return $student->student->email ?? 'N/A';
            })
    
            ->addColumn('mobile', function ($student) {
                return $student->student->mobile ?? 'N/A';
            })
    
            ->addColumn('domain', function ($student) {
                return ucfirst($student->domainClass->name ?? 'N/A');
            })
    
            ->addColumn('total_fees', function ($student) {
                return number_format($student->total_fees, 2);
            })

            ->addColumn('company_name', function ($student) use ($loggedInUser) {
                if ($loggedInUser->role == 'super-admin') {
                    return $student->company->company_name ?? 'N/A';
                }
                // return null;
            })
    
            ->addColumn('discounted_fees', function ($student) {
                return number_format($student->discounted_fees, 2);
            })
    
            ->addColumn('paid_amount', function ($student) {
                return number_format($student->paid_amount, 2);
            })
    
            ->addColumn('remaining_amount', function ($student) {
                return number_format($student->remaining_amount, 2);
            })

            ->addColumn('discounted_amount', function ($student) {
                return number_format($student->discounted_amount, 2);
            })
    
            ->editColumn('payment_type', function ($student) {
                if ($student->payment_type == 'full') {
                    return '<span class="badge badge-success">Full Payment</span>';
                } else {
                    return '<span class="badge badge-warning">Installment</span>';
                }
            })
    
            ->addColumn('created_by', function ($student) {
                return ucfirst($student->createdBy->name ?? 'N/A');
            })
    
            ->addColumn('actions', function ($student) {
                $links = [];
    
                if (auth()->user()->can('student-fees.edit')) {
                    $links[] = [
                        'title' => 'Edit',
                        'link' => route('student-fees.edit', $student->student_id),
                        'icon' => 'fa-edit',
                    ];
                }
    
                // if (auth()->user()->can('student-fees.delete')) {
                //     $links[] = [
                //         'title' => 'Delete',
                //         'link' => '',
                //         'icon' => 'fa-trash',
                //         'onclick' => "confirmDelete('" . route('student-fees.destroy', $student->student_id) . "')",
                //     ];
                // }
    
                return [
                    'id' => $student->id,
                    'links' => $links,
                ];
            })
            ->rawColumns(['actions','payment_type'])
            ->make(true);
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'discounted_fees' => 'required|numeric|min:0',
            'total_fees' => 'required|numeric|min:0',
            'payment_type' => 'required|in:full,installment',
            'installments' => 'required_if:payment_type,installment|array',
            'installments.*.amount' => 'required_if:payment_type,installment|numeric|min:0',
            'installments.*.due_date' => 'required_if:payment_type,installment|date',
            'installments.*.status' => 'required_if:payment_type,installment|in:paid,pending',
        ]);
    
        try {
            // Find the student and related domain/class data
            $student = Student::findOrFail($request->student_id);
            $domainClassId = $student->domain ?? null;
            $totalFees = $student->domainClass->fees ?? null;
            $company = $student->company_id;

            // Get the authenticated user
        $user = auth()->user();
        $createdBy = null;
        $companyId = null;

        // **Determine the Company ID and Created By**
        if ($user->role === 'super-admin') {
            $createdBy = null; // Super-admin can leave this null if needed
            $companyId = $student->company_id;
        } elseif ($user->role === 'admin') {
            $company = Company::where('user_id', $user->id)->first();
            if ($company) {
                $companyId = $company->id;
                $createdBy = $user->id;
            }
        } else {
            $companyId = $user->company_id;
            $createdBy = $user->id;
        }
            if (!$domainClassId || !$totalFees) {
                return redirect()->back()->withErrors('Student does not have a valid domain/class assigned.');
            }
    
            $discountedAmount = $totalFees - $request->discounted_fees;
    
            // **Create StudentFee record**
            $studentFee = StudentFee::create([
                'student_id' => $student->id,
                'domain_class_id' => $domainClassId,
                'total_fees' => $totalFees,
                'discounted_fees' => $request->discounted_fees,
                'discounted_amount' => $discountedAmount,
                'paid_amount' => $request->payment_type === 'full' ? $request->discounted_fees : 0,
                'remaining_amount' => $request->payment_type === 'full' ? 0 : $request->discounted_fees,
                'payment_type' => $request->payment_type,
                'company_id' => $company,
                'created_by' => $createdBy,
            ]);
    
            // Initialize paidAmount for installments
            $paidAmount = 0;
    
            // **Handle Installments if Payment Type is Installment**
            if ($request->payment_type === 'installment') {
                foreach ($request->installments as $installment) {
                    $status = ($installment['status'] === 'paid') ? 'paid' : 'pending';
    
                    // Add to paidAmount if installment status is 'paid'
                    if ($status === 'paid') {
                        $paidAmount += $installment['amount'];
                    }
    
                    // Create the installment record
                    StudentFeeInstallment::create([
                        'student_fee_id' => $studentFee->id,
                        'installment_amount' => $installment['amount'],
                        'due_date' => $installment['due_date'],
                        'company_id' => $company,
                        'status' => $status,
                        'created_by' => $createdBy,
                    ]);
                }
            } else {
                // If full payment, set paidAmount to discountedFees
                $paidAmount = $request->discounted_fees;
            }
    
            // **Calculate Remaining Amount**
            $remainingAmount = max(0, $request->discounted_fees - $paidAmount);
    
            // **Update the StudentFee with correct paid and remaining amounts**
            $studentFee->update([
                'paid_amount' => $paidAmount,
                'remaining_amount' => $remainingAmount,
                'discounted_amount' => $discountedAmount,
            ]);
    
            return redirect()->route('student-fees.index')->with('success', 'Student fees added successfully.');
    
        } catch (\Throwable $e) {
            \Log::error('Failed to create student fees: ' . $e->getMessage(), ['exception' => $e]);
            return redirect()->back()->withErrors('Failed to create student fees: ' . $e->getMessage());
        }
    }
    
    
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $student = Student::findOrFail($id);
            return response()->json([
                'success' => true,
                'student' => [
                    'email' => $student->email,
                    'mobile' => $student->mobile,
                    'domain_class_id' => $student->domain_class_id
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Student not found'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            // Fetch student details
            $student = Student::findOrFail($id);
    
            // Check if student has an existing fee record
            $studentFee = StudentFee::where('student_id', $id)->first();
            $installments = $studentFee ? StudentFeeInstallment::where('student_fee_id', $studentFee->id)->get() : [];
    
            // Fetch domains and companies
            $domains = DomainClass::where('status', 1)->orderBy('sequence_number', 'asc')->select('id', 'name', 'fees')->get();
            $companies = Company::where('status', 'active')->orderBy('created_at', 'asc')->get();
    
            return view("admin.student_fees.form", compact('student', 'studentFee', 'installments', 'companies', 'domains'))
                ->with('title', 'Student Fees Collection');
    
        } catch (\Throwable $e) {
            \Log::error('Failed to load edit form for student ID ' . $id . ': ' . $e->getMessage());
            return redirect()->back()->withErrors('Failed to load edit form: ' . $e->getMessage());
        }
    }
    
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Convert request data to an array for validation
        $data = $request->all();
    
        // Convert "unpaid" to "pending" before validation
        if (isset($data['installments'])) {
            foreach ($data['installments'] as &$installment) {
                if (isset($installment['status']) && $installment['status'] === 'unpaid') {
                    $installment['status'] = 'pending';
                }
            }
        }
    
        // Validate request data
        $validatedData = Validator::make($data, [
            'discounted_fees' => 'required|numeric|min:0',
            'total_fees' => 'required|numeric|min:0',
            'payment_type' => 'required|in:full,installment',
            'installments' => 'required_if:payment_type,installment|array|min:1',
            'installments.*.amount' => 'required_if:payment_type,installment|numeric|min:0',
            'installments.*.due_date' => 'required_if:payment_type,installment|date',
            'installments.*.status' => 'required_if:payment_type,installment|in:paid,pending',
        ])->validate();

      
    
        try {
            // Fetch student and domain details
            $student = Student::findOrFail($id);
            $domainClassId = $student->domain ?? null;
            $totalFees = $student->domainClass->fees ?? null;

            $discountedAmount = $totalFees - $request->discounted_fees;
            $user = auth()->user();
            $createdBy = null;
            $companyId = null;
    
            // **Determine the Company ID and Created By**
            if ($user->role === 'super-admin') {
                $createdBy = null; // Super-admin can leave this null if needed
                $companyId = $student->company_id;
            } elseif ($user->role === 'admin') {
                $company = Company::where('user_id', $user->id)->first();
                if ($company) {
                    $companyId = $company->id;
                    $createdBy = $user->id;
                }
            } else {
                $companyId = $user->company_id;
                $createdBy = $user->id;
            }
    
            if (!$domainClassId) {
                return redirect()->back()->withErrors('Student does not have a domain/class assigned.');
            }
    
            if (!$totalFees) {
                return redirect()->back()->withErrors('Total fees not found for this domain/class.');
            }
    
            // Check if StudentFee record exists
            $studentFee = StudentFee::where('student_id', $id)->first();
    
            if (!$studentFee) {
                // **Create new StudentFee record**
                $studentFee = StudentFee::create([
                    'student_id' => $id,
                    'domain_class_id' => $domainClassId,
                    'total_fees' => $totalFees,
                    'discounted_fees' => $validatedData['discounted_fees'],
                    'discounted_amount' => $discountedAmount,
                    'paid_amount' => 0, 
                    'remaining_amount' => $validatedData['discounted_fees'],
                    'payment_type' => $validatedData['payment_type'],
                    'created_by' => $createdBy,
                ]);
             
            } else {
                // **If payment type is changing to FULL, delete all installments**
                if ($studentFee->payment_type === 'installment' && $validatedData['payment_type'] === 'full') {
                    StudentFeeInstallment::where('student_fee_id', $studentFee->id)->delete();
                }
    
                // **Update existing StudentFee record**
                $studentFee->update([
                    'domain_class_id' => $domainClassId,
                    'total_fees' => $totalFees,
                    'discounted_fees' => $validatedData['discounted_fees'],
                    'payment_type' => $validatedData['payment_type'],
                    'updated_by' => auth()->id(),
                ]);
            }
    
            // **Initialize paid amount to 0**
            $paidAmount = 0;
    
            // **Handle Installments**
            
            if ($validatedData['payment_type'] === 'installment') {
                // **Delete previous installments**
                
                StudentFeeInstallment::where('student_fee_id', $studentFee->id)->delete();

               
              
                // **Insert new installments**
                foreach ($validatedData['installments'] as $installment) {
                
                   
                    $status = ($installment['status'] === 'paid') ? 'paid' : 'pending';

                   
    
                    // **Add to paidAmount if installment is 'paid'**
                    if ($status === 'paid') {
                      
                        $paidAmount += $installment['amount'];

                    }
                    $company = $student->company_id;
                    StudentFeeInstallment::create([
                        'student_fee_id' => $studentFee->id,
                        'installment_amount' => $installment['amount'],
                        'due_date' => $installment['due_date'],
                        'status' => $status,
                        'company_id'=> $company,
                        'created_by' => $createdBy,
                    ]);
                }
            } else {
                // **If full payment, set paidAmount to discountedFees**
                $paidAmount = $validatedData['discounted_fees'];
            }
    
            // **Calculate remaining amount**
            $remainingAmount = max(0, $validatedData['discounted_fees'] - $paidAmount);
    
            // **Update StudentFee with correct paid and remaining amounts**
            $studentFee->update([
                'paid_amount' => $paidAmount,
                'remaining_amount' => $remainingAmount,
                'discounted_amount' => $discountedAmount,
            ]);
    
            return redirect()->route('student-fees.index')->with('success', 'Student fees updated successfully.');
        } catch (\Throwable $e) {
            \Log::error('Failed to update student fees: ' . $e->getMessage(), ['exception' => $e]);
            return redirect()->route('student-fees.index')->withErrors('Failed to update student fees: ' . $e->getMessage());
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
