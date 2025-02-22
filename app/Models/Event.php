<?php

namespace App\Models;

use App\Models\Scopes\RoleCheckUserScope;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'events';
    protected $fillable = ['name', 'description', 'created_at','company_id','updated_at','status','sequence_number','color'];




    protected static function booted()
    {
        static::addGlobalScope(new RoleCheckUserScope);
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
