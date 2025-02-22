<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Scopes\RoleCheckUserScope;
class StudentFeeInstallment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_fee_id', 'installment_amount', 'due_date',
        'status', 'paid_by', 'paid_at','company_id','created_by'
    ];

    public function studentFee()
    {
        return $this->belongsTo(StudentFee::class);
    }

    public function paidBy()
    {
        return $this->belongsTo(User::class, 'paid_by');
    }

    protected static function booted()
    {
        static::addGlobalScope(new RoleCheckUserScope);
    }

    public function student()
{
    return $this->studentFee->belongsTo(Student::class);
}


}
