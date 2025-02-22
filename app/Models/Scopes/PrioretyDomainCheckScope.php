<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use App\Models\Company;

class PrioretyDomainCheckScope implements Scope
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

            $userCompany_id = $loggedInUser->company_id;

            if ($userCompany_id) {
                $builder->where('company_id', $userCompany_id);
            }
        }
    }
}
