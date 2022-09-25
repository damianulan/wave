<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use App\Traits\Taggable;


class Client extends Model
{
    use UUID;
    use HasFactory, Notifiable, SoftDeletes;
    //use Taggable;

    protected $table = 'clients';
    protected $primaryKey = 'id';

    public $timestamps = true;
    
    protected $fillable = [
        'name',
        'surname',
        'email',
        'gender',
        'hair_length',
        'birthdate' => 'datetime:d/m/Y',
        'phone',
        'avatar',
        'city'
    ];
}
