<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Department extends Model
{
    use HasFactory, HasRoles;

    protected $guarded = ['id'];
    protected $guard_name = 'web';

    public function employee()
    {
        return $this->hasMany(Employee::class, 'employee_id');
    }

}
