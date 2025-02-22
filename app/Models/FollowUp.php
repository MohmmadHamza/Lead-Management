<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Scopes\RoleCheckUserScope;
class FollowUp extends Model
{
    use HasFactory;
    use SoftDeletes;



// In FollowUp model
protected $dates = ['follow_up_date', 'created_at'];


    protected $fillable = [
        'student_id',
     
        'follow_up_date',
        'follow_up_time',
        'follow_up_status',
        'message',
        'created_by',
        'updated_by',
        'company_id',
    ];
    public function student()
{
    return $this->belongsTo(Student::class);
}

protected static function booted()
{
    static::addGlobalScope(new RoleCheckUserScope);
}
}

