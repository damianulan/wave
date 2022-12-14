<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\HasRolesAndPermissions;
use App\Traits\Loggable;
use App\Traits\Taggable;
use App\Traits\Notable;
use App\Traits\Observable;
use App\Traits\Trackable;
use App\Traits\Taskable;
use App\Models\Location;
use App\Models\UserConfig;

class User extends Authenticatable
{
    use UUID;
    use HasRolesAndPermissions;
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, Loggable;
    use Taggable, Notable, Observable, Trackable, Taskable;

    protected $table = 'users';
    protected $model = 'user';
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
        'password',
        'location_id',
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
        'birthdate' => 'datetime:d-m-Y',
        'config' => 'array',
    ];

    protected $dates = ['deleted_at', 'updated_at', 'created_at', 'birthdate'];

    public function table(){
        return 'users';
    }

    public static function allActive()
    {
        return User::where(['status' => 1])->get();
    }

    public static function allActiveButMe()
    {
        return User::where(['status' => 1])->whereNotIn('id', [auth()->user()->id])->get();
    }

    // unique traits
    public function name() {
        return $this->firstname . ' ' . $this->lastname;
    }

    public function block() {
        $this->noteActivity('block', 'users');  
        return $this->update(['status' => 0]);
    }

    public function unblock() {
        $this->noteActivity('unblock', 'users');
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

    public function birthdateFromInput($input) {
        if($input != null){
            return date("Y-m-d", strtotime($input));
        }
        return null;
    }

    public function getAvatarDefault($gender = null)
    {
        $g = '0';
        if($gender != null){
            $g = $gender;
        } else {
            $g = $this->gender;
        }
        if($g == '0'){
            return Config::getAvatarFemale();
        } elseif ($g == '1'){
            return Config::getAvatarMale();
        }

        return null;
    }

    public function getRole()
    {
        return __('forms.'.$this->roles[0]->slug);
    }

    // foreign relations
    public function location () {
        return $this->hasOne(Location::class, 'id', 'location_id');
    }

    public function settings() {
        return $this->hasOne(UserConfig::class);
    }
}
