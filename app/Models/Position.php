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

class Position extends Model
{
    use HasFactory, SoftDeletes, ActionUser, Active, Notifiable;

    protected $table = 'positions';

    protected $primaryKey = 'id';

    protected $casts = [
        'id' => 'string',
    ];

    protected $fillable = [
        'position_title',
        // 'department_id',
        'grade_id',
        'description',
        'status',
        'sort_order',
        'created_date',
        'created_by',
        'updated_by',
    ];

    // public function department() {
    //     return $this->belongsTo(Department::class, 'department_id');
    // }

    public function grade(){
        return $this->belongsTo(Grade::class, 'grade_id');
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Uuid::uuid4()->toString();
        });
    }
}
