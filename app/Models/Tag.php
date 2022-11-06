<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\UUID;

class Tag extends Model
{
    use UUID;
    use HasFactory, SoftDeletes;

    protected $table = 'tags';
    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'slug',
        'color'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class,'users_tags');
    }

    public function clients()
    {
        return $this->belongsToMany(Client::class,'clients_tags');
    }
}