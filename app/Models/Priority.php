<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Scopes\PrioretyDomainCheckScope;

class Priority extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'prioritys';

    protected $fillable = [
        'name',
        'sequence_number',
        'status',
        'created_by',
        'updated_by',
        'company_id',
       
        'color',
    ];

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
