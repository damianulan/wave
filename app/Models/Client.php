<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use App\Traits\Taggable;
use App\Models\Config;
use App\Traits\Notable;

class Client extends Model
{
    use UUID;
    use HasFactory, Notifiable, SoftDeletes, Taggable, Notable;
    //use Taggable;

    protected $table = 'clients';
    protected $model = 'client';
    protected $primaryKey = 'id';

    public $timestamps = true;
    
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'gender',
        'hair_length',
        'birthdate' => 'datetime:d-m-Y',
        'phone',
        'avatar',
        'city'
    ];

    public function table(){
        return 'clients';
    }

    public function name() {
        return $this->firstname . ' ' . $this->lastname;
    }

    public function gender() {
        if ($this->gender == '0'){
            return __('forms.female');
        } elseif ($this->gender == '1'){
            return __('forms.male');
        }
        return false;
    }

    public function birthdate() {
        if($this->birthdate != null){
            return date('d-m-Y', strtotime($this->birthdate));
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

    public function hasAccount()
    {
        if($this->password == null){
            return __('vocabulary.no');
        }
        return __('vocabulary.yes');
    }

    public function ifHasAccount(): bool
    {
        if($this->password == null){
            return false;
        }

        return true;
    }


    public function hairLength() 
    {
        return __('forms.hair_length_'.$this->hair_length);
    }
}
