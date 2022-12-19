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
use App\Traits\LocalID;
use App\Models\Task;

class Client extends Model
{
    use UUID;
    use HasFactory, Notifiable, SoftDeletes, Taggable, Notable, LocalID;
    //use Taggable;

    protected $table = 'clients';
    protected $model = 'client';
    protected $primaryKey = 'id';

    public $timestamps = true;
    
    protected $fillable = [
        'local_id',
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
        if ($this->hair_length != null){
            return __('forms.hair_length_'.$this->hair_length);
        }

        return __('forms.no_record');
    }

    public function affiliated_tasks() {
        return $this->hasMany(Task::class, 'affiliated_client_id', 'id')
                    ->whereNull('completed_at'); 
    }

    public function affiliated_tasks_all() {
        return $this->hasMany(Task::class, 'affiliated_client_id', 'id');
    }
}
