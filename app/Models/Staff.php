<?php

namespace App\Models;

use App\Traits\ActionUser;
use App\Traits\Active;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class Staff extends Model
{
    use HasFactory, SoftDeletes, ActionUser, Active, Notifiable;

    protected $table = 'staffs';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'position_id',
        'email',
        'contact_number',
        'address',
        'status',
        'sort_order',
        'created_date',
        'created_by',
        'updated_by',
    ];

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }
}

