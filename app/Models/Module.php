<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price_per_user',
        'is_active',
        'day_price',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get all companies that have purchased this module.
     */
    public function purchasedCompanies()
    {
        return $this->hasMany(PurchaseModuleCompany::class, 'module_id');
    }
}
