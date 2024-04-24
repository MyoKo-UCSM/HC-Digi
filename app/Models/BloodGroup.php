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

class BloodGroup extends Model
{
    use HasFactory, SoftDeletes, ActionUser, Active, Notifiable;

    protected $table = 'blood_groups';

    protected $primaryKey = 'id';

    protected $casts = [
        'id' => 'string',
    ];

    protected $fillable = [
        'blood_group_name',
        'description',
        'sort_order',
        'status',
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
