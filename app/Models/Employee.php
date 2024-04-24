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
use Illuminate\Support\Str;

class Employee extends Model
{
    use HasFactory, SoftDeletes, ActionUser, Active, Notifiable;
    
    protected $table = 'employees';

    protected $primaryKey = 'id';

    protected $casts = [
        'id' => 'string',
    ];

    protected $keyType = 'string'; // Define the primary key type as string
    
    public $incrementing = false; // Disable auto-incrementing for primary key

    protected $fillable = [
        'name',
        'employee_id',
        'employee_code',        
        'email',
        'contact_number',
        'position_id',
        'department_id',
        'grade_id',
        'blood_group_id',
        'nrc_code',
        'name_en',
        'name_mm',
        'nrc_type',
        'nrc_number',
        'nrc',
        'sort_order',
        'address',
        'description',
        'status',
        'employee_photo',
        'nrc_copy',
        'labor_copy',
        'family_registration_copy',
        'certificate_copy',
        'driving_license_copy',
        'created_date',
        'created_by',
        'updated_by'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function bloodGroup()
    {
        return $this->belongsTo(BloodGroup::class);
    }

    public function subDepartments()
    {
        return $this->belongsToMany(SubDepartment::class, 'employee_sub_departments', 'employee_id', 'sub_department_id');
    }

    public function nrc()
    {
        return $this->belongsTo(Nrc::class);
    }
    // Use the Str::uuid() method to generate UUIDs for the id attribute
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Str::uuid();
        });
    }
}
