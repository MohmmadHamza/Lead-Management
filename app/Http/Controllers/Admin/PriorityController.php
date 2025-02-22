<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PriorityRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Priority;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as FacadesRequest;

class PriorityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
     
        if (Auth::check() && Auth::user()->role === 'user') {
            abort(403, 'Unauthorized action.');
        }
    }
  
    public function index()
    {
        try {
            $companies = Company::all();
            return view('admin.priority.index', compact( 'companies'))->with('title', 'Priority');
        } catch (\Throwable $e) {
            \Log::error('Failed to load priority index: ' . $e->getMessage(), ['exception' => $e]);
            return redirect()->back()->withErrors('Failed to load priorities: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $companies = Company::orderBy('created_at', 'asc')->where('status', 'active')->get();
            return view('admin.priority.form', compact('companies'))->with('title', 'Priority');
        } catch (\Throwable $e) {
            \Log::error('Failed to load priority create form: ' . $e->getMessage(), ['exception' => $e]);
            return redirect()->back()->withErrors('Failed to load priority form: ' . $e->getMessage());
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PriorityRequest $request)
    {
        try {
            $validated = $request->validated();

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
            $validated['status'] = $request->status ?? 0;
            Priority::create($validated);
            return redirect()->route('priority.index')->with('success', 'Priority created successfully');
        } catch (\Throwable $e) {
            \Log::error('Failed to create priority: ' . $e->getMessage(), ['exception' => $e]);
            return redirect()->back()->withErrors('Failed to create priority: ' . $e->getMessage())->withInput();
        }
    }


    public function list(Request $request)
    {
        $loggedInUser = auth()->user();
        $priority = Priority::select('id', 'name', 'sequence_number', 'created_at', 'status', 'company_id', 'created_by')->with('company');

        if (isset($request->status) && $request->status != "") {
            $priority->where("status", $request->status);
        }

        if (isset($request->company_name) && $request->company_name != "") {
            $priority->where("company_id", $request->company_name);
        }

        return DataTables::of($priority)
            ->editColumn('created_at', function ($priority) {
                return $priority->created_at->format('d-m-Y h:i A');
            })
            ->editColumn('status', function ($priority) {
                if ($priority->status == 1) {
                    return '<span class="badge badge-success">Active</span>';
                } else {
                    return '<span class="badge badge-danger">Inactive</span>';
                }
            })
            ->editColumn('name', function ($priority) {
                return ucfirst($priority->name);
            })
            ->addColumn('company_name', function ($priority) use ($loggedInUser) {
                if ($loggedInUser->role == 'super-admin') {
                    return $priority->company->company_name ?? 'N/A';
                }
                // return null;
            })
            ->addColumn('created_by', function ($priority) {
                return ucfirst($priority->createdBy->name ?? 'N/A');
            })
            ->addColumn('actions', function ($priority) {
                $links = [];

                
                    $links[] = [
                        'title' => 'Edit',
                        'link' => route('priority.edit', $priority->id),
                        'icon' => 'fa-edit',
                    ];
               

               
                    $links[] = [
                        'title' => 'Delete',
                        'link' => '',
                        'icon' => 'fa-trash',
                        'onclick' => "confirmDelete('" . route('priority.destroy', $priority->id) . "')",
                    ];
               

                return [
                    'id' => $priority->id,
                    'links' => $links,
                ];
            })
            ->rawColumns(['actions', 'status'])
            ->make(true);
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
    public function edit(Priority $priority)
    {
        try {
            $companies = Company::orderBy('created_at', 'asc')->where('status', 'active')->get();
            return view('admin.priority.form', compact('priority', 'companies'))->with('title', 'Priority');
        } catch (\Throwable $e) {
            \Log::error('Failed to load priority edit form: ' . $e->getMessage(), ['exception' => $e]);
            return redirect()->back()->withErrors('Failed to load priority edit form: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PriorityRequest $request, Priority $priority)
    {
        try {
            $validated = $request->validated();
            $validated['status'] = $request->status ?? 0;
            $priority->update($validated);
            return redirect()->route('priority.index')->with('success', 'Priority updated successfully');
        } catch (\Throwable $e) {
            \Log::error('Failed to update priority: ' . $e->getMessage(), ['exception' => $e]);

            return redirect()->back()->withErrors('Failed to update priority: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Priority $priority)
    {

        try {
            Priority::where('id', $priority->id)->delete();
            return response()->json(['message' => 'Priority deleted successfully.'], 200);
        } catch (\Throwable $e) {
            \Log::error('Failed to delete priority: ' . $e->getMessage(), ['exception' => $e]);
            return response()->json(['message' => 'Failed to delete priority: ' . $e->getMessage()], 500);
        }
    }
    public function destroyMany(Request $request)
    {


        try {
            $priorityIds = $request->input('Checkboxes');
            Priority::whereIn('id', $priorityIds)->delete();
            return redirect()->route('priority.index')->with('error', 'Priorities deleted successfully.');
        } catch (\Throwable $e) {
            \Log::error('Failed to delete priorities: ' . $e->getMessage(), ['exception' => $e]);
            return redirect()->back()->withErrors('Failed to delete priorities: ' . $e->getMessage());
        }
    }
}
