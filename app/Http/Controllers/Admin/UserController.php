<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\City;
use App\Models\Company;
use App\Models\State;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Storage;
use Yajra\DataTables\DataTables;

use Illuminate\Support\Facades\Request as FacadesRequest;

class UserController extends Controller
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
            $roles = Role::all();
            $companies = Company::all();
            return view('admin.user.index', compact('roles', 'companies'))->with('title', 'Users');
        } catch (\Throwable $e) {
            \Log::error('Failed to load user index: ' . $e->getMessage(), ['exception' => $e]);
            return redirect()->back()->withErrors('Failed to load users: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */


     public function create()
     {
         try {
         
             $authUser = auth()->user();
             $userRole = $authUser->role;
             
             $permissions = collect();
             $companyId = null;
             
             if ($userRole === 'super-admin') {
                
                 $permissions = Permission::all();
             } elseif ($userRole === 'admin') {
                
                 $company = Company::where('user_id', $authUser->id)->first();
                 
                
                 if (!$company) {
                     throw new \Exception('Company not found for this admin');
                 }
                 
                 $companyId = $company->id;
     
               
                
                 $purchasedModuleIds = DB::table('purchase_module_company')
                     ->where('company_id', $companyId)
                     ->pluck('module_id');
                 
                   
                 $permissions = Permission::join('modules', 'permissions.module_name', '=', 'modules.name')
                     ->whereIn('modules.id', $purchasedModuleIds)
                     ->select('permissions.*')
                     ->get();
                   
             } elseif ($userRole === 'user') {
                 
                 $companyId = $authUser->company_id;
     
                 if (!$companyId) {
                     throw new \Exception('Company ID not found for this user');
                 }
     
                 
                 $purchasedModuleIds = DB::table('purchase_module_company')
                     ->where('company_id', $companyId)
                     ->pluck('module_id');
                 
                 
                 $permissions = Permission::join('modules', 'permissions.module_name', '=', 'modules.name')
                     ->whereIn('modules.id', $purchasedModuleIds)
                     ->select('permissions.*')
                     ->get();
             }
     
             $states = State::all();
             $userPermissions = [];
             $companies = Company::orderBy('created_at', 'asc')->where('status', 'active')->get();
     
             return view('admin.user.form', compact('permissions', 'states', 'userPermissions','companies'))
                 ->with('title', 'Add User');
         } catch (\Throwable $e) {
             \Log::error('Failed to load user creation form: ' . $e->getMessage(), ['exception' => $e]);
             return redirect()->back()->withErrors('Failed to load user creation form: ' . $e->getMessage());
         }
     }
     


    public function list(Request $request)
    {
        $loggedInUser = auth()->user();
        $company = Company::where('user_id', $loggedInUser->id)->first();


        $userQuery = User::select('id', 'name', 'email', 'created_at', 'created_by', 'role', 'company_id', 'status')->with('company');

       
        if ($loggedInUser->role != 'super-admin') {
            if (auth()->user()->role == 'admin') {
                $userQuery->where('company_id', $company->id);
            } else {
                $userQuery->where('company_id', auth()->user()->company_id);
            }

        }

       
        if ($request->filled('role')) {

            $userQuery->where('role', $request->role);

        }

        if ($request->filled('status')) {
            $userQuery->where('status', $request->status);
        }

        if ($request->filled('company_id')) {
            $companyId = $request->company_id;


            $adminUserId = DB::table('company')
                ->where('id', $companyId)
                ->value('user_id');


            $userQuery->where(function ($query) use ($companyId, $adminUserId) {

                $query->where('company_id', $companyId);


                if ($adminUserId) {
                    $query->orWhere('id', $adminUserId);
                }
            });
        }

      
        return DataTables::of($userQuery)
            ->editColumn('created_at', fn($user) => $user->created_at->format('d-m-Y h:i A'))
            ->editColumn('status', fn($user) => $user->status == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>')
            ->editColumn('name', fn($user) => ucfirst($user->name))


            ->editColumn('role', fn($user) =>
                auth()->user()->role == 'super-admin' ? ucfirst($user->role) : null)

            ->addColumn('company_name', function ($user) use ($loggedInUser) {

                if ($loggedInUser->role == 'super-admin') {

                    if ($user->role == 'admin') {

                        $company = Company::where('user_id', $user->id)->first();

                        return $company->company_name ?? 'N/A';
                    }

                    return $user->company->company_name ?? 'N/A';
                }

              
            })

            ->addColumn('created_by', function ($user) {
                return ucfirst($user->createdBy->name ?? 'N/A');
            })


            ->addColumn('actions', function ($user) {
                $links = [];

               
                if (auth()->user()->can('user.edit')) {
                    $links[] = [
                        'title' => __('Edit'),
                        'link' => route('user.edit', $user->id),
                        'icon' => 'fa-edit',
                    ];
                }

               
                if (auth()->user()->can('user.delete')) {
                    $links[] = [
                        'title' => __('Delete'),
                        'link' => '',
                        'icon' => 'fa-trash',
                        'onclick' => "confirmDelete('" . route('user.destroy', $user->id) . "')",
                    ];
                }

                return [
                    'id' => $user->id,
                    'links' => $links,
                ];
            })
            ->rawColumns(['actions', 'status'])
            ->make(true);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {

        try {


            $validated = $request->validated();


            $validated['password'] = bcrypt($validated['password']);

            $validated['status'] = $request->status ?? 0;

            $validated['role'] = 'user';

            if (auth()->user()->role != 'super-admin') {
                if (auth()->user()->role == 'admin') {
                    $company = Company::where('user_id', auth()->user()->id)->first();
                    $validated['company_id'] = $company->id;
                    $validated['created_by'] = auth()->user()->id;
                } else {
                    $validated['company_id'] = auth()->user()->company_id;
                    $validated['created_by'] = auth()->user()->id;
                }

            }
          

            $companyId = $validated['company_id'];
            $purchasedUserLimit = DB::table('purchase_module_company')
            ->where('company_id', $companyId)
            ->sum('user_limit'); 

            $currentUserCount = User::where('company_id', $companyId)->count();

            if ($currentUserCount >= $purchasedUserLimit) {
                return redirect()->back()->withErrors('User limit reached for your company. Please purchase additional user slots.')->withInput();
            }

            $validated['created_by'] = auth()->user()->id;

            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('users', $filename, 'public');
                $validated['photo'] = $path;
            }

            $user = User::create($validated);


            if ($request->filled('permissions')) {

                $permissions = [];


                foreach ($request->permissions as $group => $permissionData) {

                    if (isset($permissionData['manage']) && $permissionData['manage'] == '1') {

                        $permissions[] = "{$group}.create";
                        $permissions[] = "{$group}.edit";
                        $permissions[] = "{$group}.update";
                        $permissions[] = "{$group}.delete";
                    }


                    if (isset($permissionData['view']) && $permissionData['view'] == '1') {

                        $permissions[] = "{$group}.view";
                       
                    }
                }


                if (!empty($permissions)) {
                    $user->syncPermissions($permissions);
                }
            }



            return redirect()->route('user.index')->with('success', 'User created successfully');
        } catch (\Throwable $e) {
            \Log::error('User creation failed: ' . $e->getMessage(), ['exception' => $e]);
            return redirect()->back()->withErrors('Failed to create user: ' . $e->getMessage())->withInput();
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
    public function edit(User $user)
    {
        try {
            $authUser = auth()->user();
            $userRole = $authUser->role;
            
            $permissions = collect();
            $companyId = null;
            
            if ($userRole === 'super-admin') {
               
                $permissions = Permission::all();
            } elseif ($userRole === 'admin') {
               
                $company = Company::where('user_id', $authUser->id)->first();
                
               
                if (!$company) {
                    throw new \Exception('Company not found for this admin');
                }
                
                $companyId = $company->id;
    
              
               
                $purchasedModuleIds = DB::table('purchase_module_company')
                    ->where('company_id', $companyId)
                    ->pluck('module_id');
                
                  
                $permissions = Permission::join('modules', 'permissions.module_name', '=', 'modules.name')
                    ->whereIn('modules.id', $purchasedModuleIds)
                    ->select('permissions.*')
                    ->get();
                  
            } elseif ($userRole === 'user') {
                
                $companyId = $authUser->company_id;
    
                if (!$companyId) {
                    throw new \Exception('Company ID not found for this user');
                }
    
                
                $purchasedModuleIds = DB::table('purchase_module_company')
                    ->where('company_id', $companyId)
                    ->pluck('module_id');
                
                
                $permissions = Permission::join('modules', 'permissions.module_name', '=', 'modules.name')
                    ->whereIn('modules.id', $purchasedModuleIds)
                    ->select('permissions.*')
                    ->get();
            }
    
            $states = State::all();
            $cities = City::all();
            $companies = Company::orderBy('created_at', 'asc')->where('status', 'active')->get();

            $userPermissions = $user->getAllPermissions()->pluck('name')->toArray();

            return view('admin.user.form', compact('user', 'permissions', 'states', 'cities', 'userPermissions','companies'))->with('title', 'Edit User');
        } catch (\Throwable $e) {
            \Log::error('Failed to load user edit form for user ID ' . $user->id . ': ' . $e->getMessage(), ['exception' => $e]);
            return redirect()->back()->withErrors('Failed to load user edit form: ' . $e->getMessage());
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {

        try {
            $validated = $request->validated();
            $validated['status'] = $request->status ?? 0;

            if (empty($validated['password'])) {
                unset($validated['password']);
                unset($validated['confirm_password']);
            } else {
                $validated['password'] = bcrypt($validated['password']);
            }

            if ($request->hasFile('photo')) {
                if ($user->photo && Storage::disk('public')->exists($user->photo)) {
                    Storage::disk('public')->delete($user->photo);
                }

                $file = $request->file('photo');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('users', $filename, 'public');
                $validated['photo'] = $path;
            }



            $user->update($validated);


            if ($request->filled('permissions')) {

                $permissions = [];



                foreach ($request->permissions as $groupName => $permissionsData) {

                    if (isset($permissionsData['manage']) && $permissionsData['manage'] == '1') {
                        $permissions[] = $groupName . '.create';
                        $permissions[] = $groupName . '.edit';
                        $permissions[] = $groupName . '.delete';
                    }


                    if (isset($permissionsData['view']) && $permissionsData['view'] == '1') {
                        $permissions[] = $groupName . '.view';
                      
                    }
                }


                $user->syncPermissions($permissions);
            } else {

                $user->syncPermissions([]);
            }


            return redirect()->route('user.index')->with('success', 'User updated successfully');
        } catch (\Throwable $e) {

            \Log::error('User update failed: ' . $e->getMessage(), ['exception' => $e]);


            return redirect()->back()->withErrors('Failed to update user: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            // Ensure the user exists
            if (!$user) {
                return response()->json(['message' => 'User not found.'], 404);
            }

            $user->delete();
            return response()->json(['message' => 'User deleted successfully.'], 200);
        } catch (\Throwable $e) {

            \Log::error('Failed to delete user: ' . $e->getMessage(), ['exception' => $e]);

            return response()->json(['message' => 'Failed to delete user: ' . $e->getMessage()], 500);
        }
    }

    public function destroyMany(Request $request)
    {


        try {

            $userIds = $request->input('Checkboxes');
            User::whereIn('id', $userIds)->delete();
            return redirect()->route('user.index')->with('error', 'Users deleted successfully.');
        } catch (\Throwable $e) {

            \Log::error('Failed to delete users: ' . $e->getMessage(), ['exception' => $e]);

            return redirect()->back()->withErrors(['Failed to delete users: ' . $e->getMessage()]);
        }
    }




}
