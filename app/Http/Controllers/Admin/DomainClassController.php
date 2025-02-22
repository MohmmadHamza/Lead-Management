<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DomainClassRequest;
use App\Models\Company;
use App\Models\DomainClass;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class DomainClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        // Restrict users with the 'user' role
        if (Auth::check() && Auth::user()->role === 'user') {
            abort(403, 'Unauthorized action.');
        }
    }
    
    public function index()
    {
        try {
            $companies = Company::all();
            return view('admin.domain_class.index')->with('title', 'Domain / Class')->with('companies', $companies);
        } catch (\Throwable $e) {
            \Log::error('Failed to load domain class index: ' . $e->getMessage(), ['exception' => $e]);
            return redirect()->back()->withErrors('Failed to load domain class data: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $companies = Company::orderBy('created_at', 'asc')->where('status', 'active')->get();
            return view('admin.domain_class.form', compact('companies'))->with('title', 'Add Domain / Class');
        } catch (\Throwable $e) {
            \Log::error('Failed to load domain class creation form: ' . $e->getMessage(), ['exception' => $e]);
            return redirect()->back()->withErrors('Failed to load the creation form: ' . $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DomainClassRequest $request)
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

            DomainClass::create($validated);
            return redirect()->route('domain_class.index')->with('success', 'Domain / Class created successfully');
        } catch (\Throwable $e) {
            \Log::error('Failed to create domain class: ' . $e->getMessage(), ['exception' => $e]);
            return redirect()->back()->withErrors('Failed to create domain class: ' . $e->getMessage())->withInput();
        }
    }

    public function list(Request $request)
    {
        $loggedInUser = auth()->user();
        $domain_class = DomainClass::select('id', 'name', 'sequence_number', 'created_at', 'company_id', 'status', 'created_by','fees')->with('company');


        if ($request->filled('status')) {
            $domain_class->where("status", $request->status);
        }

        if ($request->filled('company_id')) {
            $domain_class->where("company_id", $request->company_id);
        }



        return DataTables::of($domain_class)

            ->editColumn('created_at', function ($domain_class) {
                return $domain_class->created_at->format('d-m-Y h:i A');
            })

            ->editColumn('status', function ($domain_class) {
                if ($domain_class->status == 1) {
                    return '<span class="badge badge-success">Active</span>';
                } else {
                    return '<span class="badge badge-danger">Inactive</span>';
                }
            })
            ->addColumn('company_name', function ($domain_class) use ($loggedInUser) {
                if ($loggedInUser->role == 'super-admin') {
                    return $domain_class->company->company_name ?? 'N/A';
                }
                // return null;
            })
            ->addColumn('created_by', function ($domain_class) {

                return ucfirst($domain_class->createdBy->name ?? 'N/A');
            })


            ->editColumn('name', function ($domain_class) {
                return ucfirst($domain_class->name);
            })
            ->addColumn('actions', function ($domain_class) {
                $links = [];

                
                    $links[] = [
                        'title' => 'Edit',
                        'link' => route('domain_class.edit', $domain_class->id),
                        'icon' => 'fa-edit',
                    ];
              

              
                    $links[] = [
                        'title' => 'Delete',
                        'link' => '',
                        'icon' => 'fa-trash',
                        'onclick' => "confirmDelete('" . route('domain_class.destroy', $domain_class->id) . "')",
                    ];
               

                return [
                    'id' => $domain_class->id,
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
    public function edit(DomainClass $domain_class)
    {
        try {
            $companies = Company::orderBy('created_at', 'asc')->where('status', 'active')->get();
            return view('admin.domain_class.form', compact('companies'))->with('title', 'Edit Domain / Class')->with('domain_class', $domain_class);
        } catch (\Throwable $e) {
            \Log::error('Failed to load edit form for domain class ID ' . $domain_class->id . ': ' . $e->getMessage(), ['exception' => $e]);
            return redirect()->back()->withErrors('Failed to load the edit form: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DomainClassRequest $request, DomainClass $domain_class)
    {
        try {
            $validated = $request->validated();
            $validated['status'] = $request->status ?? 0;
            $domain_class->update($validated);
            return redirect()->route('domain_class.index')->with('success', 'Domain / Class updated successfully');
        } catch (\Throwable $e) {
            \Log::error('Failed to update domain class ID ' . $domain_class->id . ': ' . $e->getMessage(), ['exception' => $e]);
            return redirect()->back()->withErrors('Failed to update domain class: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DomainClass $domain_class)
    {
        try {
            $domain_class = DomainClass::findOrFail($domain_class->id);
            DomainClass::where('id', $domain_class->id)->delete();
            return response()->json(['message' => 'Domain / Class deleted successfully.'], 200);
        } catch (\Throwable $e) {
            \Log::error('Failed to delete domain class ID ' . $domain_class->id . ': ' . $e->getMessage(), ['exception' => $e]);
            return response()->json(['message' => 'Failed to delete domain / class: ' . $e->getMessage()], 500);
        }
    }

    public function destroyMany(Request $request)
    {
        try {
            $domain_classIds = $request->input('Checkboxes');
            DomainClass::whereIn('id', $domain_classIds)->delete();
            return redirect()->route('domain_class.index')->with('error', 'Domain / Classes deleted successfully.');
        } catch (\Throwable $e) {
            \Log::error('Failed to delete domain classes: ' . $e->getMessage(), ['exception' => $e]);
            return redirect()->back()->withErrors('Failed to delete domain classes: ' . $e->getMessage());
        }
    }
}
