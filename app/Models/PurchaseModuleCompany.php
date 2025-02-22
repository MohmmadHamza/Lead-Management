<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PurchaseModuleCompany extends Model
{
    use HasFactory;

    protected $table = 'purchase_module_company'; 

    protected $fillable = [
        'company_id',
        'module_id',
        'user_limit',
        'subscription_period',
        'start_date',
        'end_date',
        'status',

    ];

    /**
     * Get the company that purchased the module.
     */
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    /**
     * Get the module details.
     */
    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }
}
