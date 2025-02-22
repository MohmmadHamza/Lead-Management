<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use App\Models\Company;

class RoleCheckUserScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        $loggedInUser = auth()->user();

        if ($loggedInUser->role === 'super-admin') {
            
            return;
        } elseif ($loggedInUser->role === 'admin') {
            
            $company = Company::where('user_id', $loggedInUser->id)->first();
            if ($company) {
                $builder->where('company_id', $company->id);
            }
        } else {
            
            $builder->where('created_by', $loggedInUser->id);
        }
    }
}
