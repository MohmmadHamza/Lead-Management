<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Scopes\RoleCheckUserScope;


class Student extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['follow_up_date'];
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'address',
        'status',
        'gender',
        'state',
        'city',
        'domain',
        'created_by',
        'updated_by',
        'priority_id',
        'message',
        'follow_up_date',
        'company_id',
        'parents_mobile',
        'qualification',
        'college',
        'student_profile',
        'resume',
        'admission_date',
        'followup_status',
        
    ];
    protected $casts = [
        'admission_date' => 'date',
    ];
    
    public function createdby()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function followups()
    {
        return $this->hasMany(FollowUp::class);
    }

    protected static function booted()
    {
        static::addGlobalScope(new RoleCheckUserScope);
    }

    public function domainClass()
    {
        return $this->belongsTo(DomainClass::class, 'domain');
    }

    public function priority()
    {
        return $this->belongsTo(Priority::class, 'priority_id');
    }

    public function cityName()
    {
        return $this->belongsTo(City::class, 'city');
    }
    
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

   

    
}
