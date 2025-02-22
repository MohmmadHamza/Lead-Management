<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['key', 'name','company_id','group_menu'];


    protected static function booted()
{
    static::addGlobalScope('companyScope', function (Builder $builder) {
        $loggedInUser = auth()->user();

        if (!$loggedInUser) {
            return; // No user logged in, skip filtering
        }

        if ($loggedInUser->role === 'super-admin') {
            // Super admin should only see company_id NULL items
            $builder->whereNull('company_id');
            return;
        } 
            
        if ($loggedInUser->role === 'admin') {
            $company = Company::where('user_id', $loggedInUser->id)->first();
            if ($company) {
                $builder->where('company_id', $company->id);
            }
        } else {
            $userCompanyId = $loggedInUser->company_id;
            if ($userCompanyId) {
                $builder->where('company_id', $userCompanyId);
            }
        }
    });
}

}
