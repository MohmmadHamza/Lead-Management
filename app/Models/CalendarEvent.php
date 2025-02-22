<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\RoleCheckUserScope;
class CalendarEvent extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'start', 'end', 'backgroundColor', 'borderColor','company_id','created_by'];


    protected static function booted()
    {
        static::addGlobalScope(new RoleCheckUserScope);
    }
}
