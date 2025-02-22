<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\PrioretyDomainCheckScope;

class DomainClass extends Model
{
    protected $table = 'domain_classes';
    protected $fillable = ['name', 'status', 'sequence_number','company_id','created_by','color','fees'];


    protected static function booted()
    {
        static::addGlobalScope(new PrioretyDomainCheckScope);
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
