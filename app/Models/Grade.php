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

class Grade extends Model
{
    use HasFactory, SoftDeletes, ActionUser, Active, Notifiable;

    protected $table = 'grades';

    protected $primaryKey = 'id';

    protected $casts = [
        'id' => 'string',
    ];

    protected $fillable = [
        'grade_name',
        'grade_code',
        'description',
        'status',
        'sort_order',
        'created_date',
        'created_by',
        'updated_by',
    ];

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

