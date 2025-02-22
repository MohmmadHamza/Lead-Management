<?php

namespace App\Traits;

use Illuminate\Contracts\Auth\Authenticatable;
trait AuthorizationChecker
{
    
    protected function checkAuthorization($user, $routeName)
    {
      
         /**
     * Check if the user is authorized to perform the action.
     *
     * @param Authenticatable $user
     * @param array|string $permissions
     * @return void
     */
  
     list($resource, $action) = explode('.', $routeName);
     
     
     $permissionMap = [
         'index' => 'view',
         'list' => 'view',
         'getprice'=> 'create',
         'dashboardList' => 'view',
         'show' => 'view',
         'create' => 'create',
         'edit' => 'edit',
         'update' => 'edit',
         'destroy' => 'delete',
         'delete' => 'delete',
         'store' => 'create',
         'getcropstage' => 'create',
         'service_order' => 'create',
         'cancel_order' => 'create',
         'verify' => 'create',
         'filter' => 'create',
         'detail' => 'create',
     ];
     
   
     
     $permissionKey = $permissionMap[$action] ?? $action; 
     $permissionToCheck = "{$resource}.{$permissionKey}";

    
     if (!$user->can($permissionToCheck)) {
            abort(403, 'Sorry! You are unauthorized to perform this action.');
        }
    }
}
