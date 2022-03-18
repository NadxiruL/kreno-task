<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Employee extends Model
{
    use HasFactory, HasRoles;

    protected $guarded = ['id'];
    protected $guard_name = 'web';

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    // public function roles()
    // {
    //     return $this->hasOne(Role::class);
    // }
}
