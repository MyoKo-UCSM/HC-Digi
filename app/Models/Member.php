<?php

namespace App\Models;

use App\Traits\ActionUser;
use App\Traits\Active;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class Member extends Model
{
    use HasFactory, SoftDeletes, ActionUser, Active, Notifiable;

    protected $table = 'members';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'title',
        'email',
        'contact_number',
        'institution',
        'password',
        'status',
        'created_date',
        'created_by',
        'updated_by',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }
}
