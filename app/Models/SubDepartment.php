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


class SubDepartment extends Model
{
    use HasFactory, SoftDeletes, ActionUser, Active, Notifiable;

    protected $table = 'sub_departments';

    protected $primaryKey = 'id';

    protected $casts = [
        'id' => 'string',
    ];
    

    protected $fillable = [
        'sub_department_name',
        'department_id',
        'description',
        'status',
        'created_date',
        'created_by',
        'updated_by',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_sub_departments', 'sub_department_id', 'employee_id');
    }

    // Boot method to generate UUID for new records
    protected static function boot()
    {
        parent::boot();

        // Generate UUID for new records
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Uuid::uuid4()->toString();
        });
    }
}