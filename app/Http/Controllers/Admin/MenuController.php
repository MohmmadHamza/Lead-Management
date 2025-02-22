<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Menu;
use App\Models\PurchaseModuleCompany;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loggedInUser = auth()->user();
        if ($loggedInUser->role === 'admin') {
            $company = Company::where('user_id', $loggedInUser->id)->first();
            
            $company_id=$company->id;
           
            $purchases = PurchaseModuleCompany::with('company', 'module')->where('company_id', $company_id)->get();
          
        }else{
            abort(404);
        }
       
       
        return view('admin.setting.menu_index',compact('purchases') )->with('title', 'Menu Setting');
    }

    public function list(Request $request)
    {
        $loggedInUser = auth()->user();
        
        // Determine the company_id
        $company_id = null;
        if ($loggedInUser->company_id) {
            $company_id = $loggedInUser->company_id;
        } else {
            // If the user is an admin (exists in the Company table)
            $company = Company::where('user_id', $loggedInUser->id)->first();
            if ($company) {
                $company_id = $company->id;
            }
        }
    
        // Query purchase modules based on company_id
        $purchase_detail = PurchaseModuleCompany::select(
            'id', 'company_id', 'module_id', 'user_limit', 
            'created_at', 'start_date', 'end_date', 'subscription_period', 'status'
        )->with('module')
        ->where('company_id', $company_id); 
    
        // Apply status filter if requested
        if ($request->filled('status')) {
            $purchase_detail->where("status", $request->status);
        }

        if ($request->start_date) {
            $purchase_detail->whereDate('created_at', '>=', $request->start_date);
        }

        if ($request->end_date) {
            $purchase_detail->whereDate('created_at', '<=', $request->end_date);
        }
    
        return DataTables::of($purchase_detail)
            ->editColumn('created_at', function ($purchase_detail) {
                return $purchase_detail->created_at->format('d-m-Y h:i A');
            })
            ->editColumn('status', function ($purchase_detail) {
                return $purchase_detail->status == 1 
                    ? '<span class="badge badge-success">Active</span>' 
                    : '<span class="badge badge-danger">Inactive</span>';
            })
            ->addColumn('module_name', function ($purchase_detail) {
                return $purchase_detail->module->name ?? 'N/A';
            })
            ->rawColumns(['status'])
            ->make(true);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $groupedMenus = Menu::all()->groupBy('group_menu');
        return view('admin.setting.menu_index_new' ,compact('groupedMenus'))->with('title', 'Menu Setting');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
        // Validate the request
        $request->validate([
            'menus.*.name' => 'required|string|max:255',
        ]);
       
        // Get authenticated user ID and their company ID
        $user_id = auth()->user()->id;
        $company_id = Company::where('user_id', $user_id)->value('id');
    
        // Track update status
        $updated = false;
    
        // Loop through menu items to update
        foreach ($request->menus as $menuId => $menuData) {
            $menu = Menu::find($menuId);
    
            if ($menu && strpos($menu->key, "_$company_id") !== false) {
                $menu->update(['name' => $menuData['name']]);
                $updated = true;
            }
        }
    
        // Return JSON response
        if ($updated) {
            return response()->json(['message' => 'Menu Data Updated successfully.'], 200);
        } else {
            return response()->json(['message' => 'No changes made or invalid company data.'], 400);
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      
    }
    
    
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
