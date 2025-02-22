<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\PurchaseModuleCompany;
use App\Models\Module;
use App\Models\Company;
use Spatie\Permission\Models\Permission;

class CheckModuleAccess
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // **Allow Super Admins to bypass module checks**
        if (!$user || $user->role === 'super-admin') {
            return $next($request);
        }

        // **Skip Check for Dashboard Route**
        $excludedRoutes = ['dashboard'];  // Add more routes if needed
        if (in_array(Route::currentRouteName(), $excludedRoutes)) {
            return $next($request);
        }

        // **Determine the Company ID based on user role**
        $companyId = null;

        if ($user->role === 'admin') {
            $company = Company::where('user_id', $user->id)->first();
            if ($company) {
                $companyId = $company->id;
            }
        } else {
            $companyId = $user->company_id;
        }

        // **If no valid company ID is found, deny access**
        if (!$companyId) {
            return redirect()->route('dashboard')->with('error', 'No associated company found.');
        }

        // **Get current route name**
        $routeName = Route::currentRouteName();

        // **Extract base module name & action**
        $routeParts = explode('.', $routeName);
        if (count($routeParts) < 2) {
            return redirect()->route('dashboard')->with('error', 'Invalid route structure.');
        }

        $moduleBase = $routeParts[0]; 
        $action = $routeParts[1];
       

        if ($user->role === 'admin' && in_array($moduleBase, ['priority', 'domain_class','menu','user-profile','get.cities'])) {
            return $next($request);
        }

       
    
        if ($user->role === 'user' && in_array($moduleBase, ['user-profile','get.cities'])) {
            return $next($request);
        }

        if ($user->role === 'admin' && in_array($routeName, ['get.cities'])) {
            return $next($request);
        }
        if ($user->role === 'user' && in_array($routeName, ['get.cities'])) {
            return $next($request);
        }

        // **Permission Mapping**
        $permissionMap = [
            'index' => 'view',
            'list' => 'view',
            'getprice'=> 'create',
            'dashboardList' => 'view',
            'show' => 'view',
            'create' => 'create',
            'store' => 'create',
            'edit' => 'edit',
            'update' => 'edit',
            'destroy' => 'delete',
            'delete' => 'delete',
        ];

        $permissionName = isset($permissionMap[$action]) ? "{$moduleBase}.{$permissionMap[$action]}" : null;

        if (!$permissionName) {
            return redirect()->route('dashboard')->with('error', 'Permission mapping not found.');
        }

        // **Find the corresponding permission**
        $permission = Permission::where('name', $permissionName)->first();
        if (!$permission) {
            return redirect()->route('dashboard')->with('error', 'Permission not found.');
        }

        // **Find the corresponding module**
        $module = Module::where('name', $permission->module_name)->first();
        if (!$module) {
            return redirect()->route('dashboard')->with('error', 'Module not found.');
        }

        // **Check if the company has purchased the module**
        $hasModule = PurchaseModuleCompany::where('company_id', $companyId)
            ->where('module_id', $module->id)
            ->exists();

            if (!$hasModule) {
                return response()->view('admin.purchase.index');
            }
            

        return $next($request);
    }
}
