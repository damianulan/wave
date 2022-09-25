<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\HasRolesAndPermissions;
use App\Traits\Loggable;
use App\Traits\Taggable;

class User extends Authenticatable
{
    use UUID;
    use HasRolesAndPermissions;
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, Loggable;
    //use Taggable;

    protected $table = 'users';
    protected $primaryKey = 'id';

    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'role',
        'nickname',
        'gender',
        'birthdate' => 'datetime:d/m/Y',
        'phone',
        'avatar',
        'address',
        'zipcode',
        'city',
        'state',
        'country',
        'status',
        'email_verified_at',
        // settings
        'locale',
        'additional_notifications',
        'client_schedules',
        'email_notifications',
        'news_on_updates',

        'location_id'
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'birthdate' => 'datetime:d/m/Y',
    ];

    protected $dates = ['deleted_at', 'birthdate'];
}
