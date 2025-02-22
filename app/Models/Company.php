<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'company';

    protected $fillable = ['name', 'company_name', 'email', 'phone', 'team_size', 'industry', 'user_id', 'status', 'created_by', 'updated_by', 'deleted_by', 'deleted_at', 'created_at', 'updated_at','photo'];
    public function users()
    {
        return $this->hasMany(User::class);
    }
    
}
