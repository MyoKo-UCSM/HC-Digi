<?php

namespace App\Models;

use App\Traits\ActionUser;
use App\Traits\Active;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class EmployeeSubDepartment extends Model
{
    protected $table = 'employee_sub_departments';

    protected $fillable = [
        'employee_id', 'sub_department_id'
    ];

    public $timestamps = false;

    // Mutator for converting string to UUID
    public function setEmployeeIdAttribute($value)
    {
        $this->attributes['employee_id'] = Uuid::fromString($value);
    }

    // Mutator for converting string to UUID
    public function setSubDepartmentIdAttribute($value)
    {
        $this->attributes['sub_department_id'] = Uuid::fromString($value);
    }

    // Ensure uniqueness using a custom method
    // public static function isUnique($employeeId, $subDepartmentId)
    // {
    //     return !self::where('employee_id', $employeeId)
    //                 ->where('sub_department_id', $subDepartmentId)
    //                 ->exists();
    // }
}