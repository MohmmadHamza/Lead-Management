<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\StudentFee;
use App\Models\StudentFeeInstallment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Yajra\DataTables\DataTables;
class StudentFeesDashboardController extends Controller
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

        $monthlyData = [];
        $students = StudentFee::all();
        $year = date('Y'); // Current year

        

        $totalPending = StudentFeeInstallment::where('status', 'pending')
        ->whereYear('due_date', $year)
        ->sum('installment_amount') ?? 0;

    $totalCollected = StudentFeeInstallment::where('status', 'paid')
        ->whereYear('due_date', $year)
        ->sum('installment_amount') ?? 0;

         // Get payment type counts
    $fullPaymentCount = StudentFee::where('payment_type', 'full')->count();
    $installmentCount = StudentFee::where('payment_type', 'installment')->count();
    
    $totalPayments = $fullPaymentCount + $installmentCount;


        // Calculate percentages
    $fullPaymentPercentage = ($totalPayments > 0) ? round(($fullPaymentCount / $totalPayments) * 100, 2) : 0;
    $installmentPercentage = ($totalPayments > 0) ? round(($installmentCount / $totalPayments) * 100, 2) : 0;
    
    $today = now()->toDateString(); 
    $todaysCollectedData = StudentFeeInstallment::with(['studentFee.student'])
    ->where('status', 'paid')
    ->whereDate('due_date', $today)
    ->get();
    
        for ($month = 1; $month <= 12; $month++) {
         
    
            // Total pending installment amount (status = 'pending')
            $pendingAmount = StudentFeeInstallment::where('status', 'pending')
                ->whereMonth('due_date', $month)
                ->whereYear('due_date', $year)
                ->sum('installment_amount') ?? 0;
    
            // Total collected installment amount (status = 'paid')
            $collectedAmount = StudentFeeInstallment::where('status', 'paid')
                ->whereMonth('due_date', $month)
                ->whereYear('due_date', $year)
                ->sum('installment_amount') ?? 0;
    
                $companies = Company::all();
                
            $monthlyData[] = [
                'month' => date("F", mktime(0, 0, 0, $month, 1)), // Convert month number to name
                'pending' => $pendingAmount,
                'collected' => $collectedAmount
            ];
        }
    
        return view('admin.student_fees_dashboard.index', compact('todaysCollectedData','companies','monthlyData','students','totalPending','totalCollected','installmentPercentage','fullPaymentPercentage'));
    }
    
    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       

       return view('admin.student_fees_dashboard.report_list')->with('title', 'Outstanding Fees'); 
    }

    public function list(Request $request)
    {
        $loggedInUser = auth()->user();
    
        // Fetching Student Fees along with pending installments
        $students = StudentFeeInstallment::with(['studentFee.student', 'studentFee.createdBy', 'studentFee.company'])
            ->where('status', '!=', 'paid') // Only fetch pending installments
            ->when($request->start_date && $request->end_date, function ($query) use ($request) {
                // Apply date filter if provided
                $query->whereBetween('due_date', [$request->start_date, $request->end_date]);
            }, function ($query) {
                // Default filter to the current month
                $query->whereMonth('due_date', now()->month)
                      ->whereYear('due_date', now()->year);
            });
    
        if (isset($request->company_name) && $request->company_name != "") {
            $students->whereHas('studentFee', function ($query) use ($request) {
                $query->where("company_id", $request->company_name);
            });
        }
    
        return DataTables::of($students)
            ->editColumn('created_at', function ($installment) {
                return $installment->created_at ? $installment->created_at->format('d-m-Y h:i A') : 'N/A';
            })
            ->addColumn('student_name', function ($installment) {
                return ucfirst($installment->studentFee->student->name ?? 'N/A');
            })
            ->addColumn('mobile', function ($installment) {
                return $installment->studentFee->student->mobile ?? 'N/A';
            })
            ->addColumn('company_name', function ($installment) use ($loggedInUser) {
                return $loggedInUser->role == 'super-admin' ? $installment->studentFee->company->company_name ?? 'N/A' : null;
            })
            ->addColumn('created_by', function ($installment) {
                return ucfirst($installment->studentFee->createdBy->name ?? 'N/A');
            })
            ->addColumn('pending_payment', function ($installment) {
                return $installment->installment_amount;
            })
            ->addColumn('due_date', function ($installment) {
                return \Carbon\Carbon::parse($installment->due_date)->format('d-m-Y');
            })
            ->addColumn('actions', function ($installment) {
                $links = [];
    
                if (auth()->user()->can('student-fees-dashboard.edit')) {
                    $links[] = [
                        'title' => 'Edit',
                        'link' => route('student-fees.edit', $installment->studentFee->student_id),
                        'icon' => 'fa-edit',
                    ];
                }
    
                return [
                    'id' => $installment->id,
                    'links' => $links,
                ];
            })
            ->rawColumns(['actions'])
            ->make(true);
    }








    public function dashboardList(Request $request)
{
   
    $loggedInUser = auth()->user();
    $filter = $request->filter_days ?? 'Today';

    $students = StudentFeeInstallment::with(['studentFee.student', 'studentFee.createdBy', 'studentFee.company'])
        ->where('status', '!=', 'paid'); 

    
   


    if ($request->filled('due_date')) {
       

      
        if ($request->due_date == 'Today') {
            $students->whereDate('due_date', now());
        } elseif ($request->due_date == 'Yesterday') {
           
            $students->whereDate('due_date', now()->subDay());
        } elseif ($request->due_date == 'Month') {
            $students->whereMonth('due_date', now()->month)
                     ->whereYear('due_date', now()->year);
        }
    }

    if (isset($request->company_name) && $request->company_name != "") {
        $students->whereHas('studentFee', function ($query) use ($request) {
            $query->where("company_id", $request->company_name);
        });
    }

    return DataTables::of($students)
        ->editColumn('created_at', function ($installment) {
            return $installment->created_at ? $installment->created_at->format('d-m-Y h:i A') : 'N/A';
        })
        ->addColumn('student_name', function ($installment) {
            return ucfirst($installment->studentFee->student->name ?? 'N/A');
        })
        ->addColumn('mobile', function ($installment) {
            return $installment->studentFee->student->mobile ?? 'N/A';
        })
        ->addColumn('company_name', function ($installment) use ($loggedInUser) {
            return $loggedInUser->role == 'super-admin' ? $installment->studentFee->company->company_name ?? 'N/A' : null;
        })
        ->addColumn('created_by', function ($installment) {
            return ucfirst($installment->studentFee->createdBy->name ?? 'N/A');
        })
        ->addColumn('pending_payment', function ($installment) {
            return $installment->installment_amount;
        })
        ->addColumn('due_date', function ($installment) {
            return \Carbon\Carbon::parse($installment->due_date)->format('d-m-Y');
        })
        ->rawColumns(['actions'])
        ->make(true);
}

    
    
    
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
