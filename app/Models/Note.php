<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\UUID;
use App\Models\User;

class Note extends Model
{
    use UUID;
    use HasFactory, SoftDeletes;

    protected $table = 'notes';
    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'text',
    ];

    protected $casts = [
        'text' => 'array',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class,'users_notes');
    }

    public function clients()
    {
        return $this->belongsToMany(Client::class,'clients_notes');
    }

    public function author()
    {
        $user = User::findOrFail($this->added_by);
        if($user){
            return $user;
        }
        return null;
    }

}
