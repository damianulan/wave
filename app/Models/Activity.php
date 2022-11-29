<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Activity extends Model
{
    use HasFactory;

    protected $table = 'users_activity';
    protected $primaryKey = 'id';

    public $timestamps = [ 'created_at', 'updated_at' ];
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'ip',
        'action',
        'model',
        'data',
        'target_id',
    ];

    protected $casts = [
        'data' => 'array',
    ];

    public function getTargetData()
    {
        if ($this->model == 'users'){
            $user = User::findOrFail($this->target_id);
            return $user;
        }
    }
}
