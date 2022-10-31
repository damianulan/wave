<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\HasRolesAndPermissions;
use App\Traits\Loggable;
use App\Traits\Taggable;
use App\Models\Location;
use App\Lib\Datatables\Models\Datatable;
use Hash;

class User extends Authenticatable
{
    use UUID;
    use HasRolesAndPermissions;
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, Loggable;
    use Taggable;

    protected $table = 'users';
    protected $primaryKey = 'id';

    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'nickname',
        'gender',
        'birthdate',
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
        'config',
        'password',
        'location_id',
        'locale'
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
        'config' => AsArrayObject::class,
    ];

    protected $dates = ['deleted_at', 'birthdate'];

    public function table(){
        return 'users';
    }

    // unique traits
    public function name() {
        return $this->firstname . ' ' . $this->lastname;
    }

    public function block() {
        return $this->update(['status' => 0]);
    }

    public function unblock() {
        return $this->update(['status' => 1]);
    }

    public function isActive(): bool {
        if($this->status == 1){
            return true;
        }
        return false;
    }

    public function gender() {
        if ($this->gender == '0'){
            return __('forms.female');
        } elseif ($this->gender == '1'){
            return __('forms.female');
        }
        return false;
    }

    public function locationName() {
        if (isset($this->location)){
            return $this->location->name;
        }
        return __('forms.none');
    }

    public function address() {
        if (isset($this->address) && isset($this->city)){
            return $this->address . ', ' . $this->city;
        }
        else {
            return __('messages.no_address');
        }
    }

    public function birthdate() {
        if($this->birthdate != null){
            return date('d-m-Y', strtotime($this->birthdate));
        }
        return null;
    }

    // foreign relations
    public function location () {
        return $this->hasOne(Location::class, 'id', 'location_id');
    }

}
