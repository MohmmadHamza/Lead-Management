<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Scopes\RoleCheckUserScope;

class StudentFee extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'student_id', 'domain_class_id', 'total_fees', 'discounted_fees',
        'paid_amount', 'remaining_amount', 'payment_type', 'created_by', 'updated_by','discounted_amount','company_id'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function domainClass()
    {
        return $this->belongsTo(DomainClass::class);
    }

    protected static function booted()
    {
        static::addGlobalScope(new RoleCheckUserScope);
    }

    public function installments()
    {
        return $this->hasMany(StudentFeeInstallment::class);
    }

    public function createdby()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
