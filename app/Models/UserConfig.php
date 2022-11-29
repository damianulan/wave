<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Traits\UUID;

class UserConfig extends Model
{
    use UUID, HasFactory;

    protected $table = 'users_config';
    protected $primaryKey = 'id';

    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'locale',
        'force_password',
        'additional_notifications',
        'client_schedules',
        'email_notifications',
        'news_on_updates',
    ];
}
