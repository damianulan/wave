<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class Subscription extends Model
{
    use UUID;
    use HasFactory;

    protected $table = 'subscriptions';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $casts = [
        'config' => AsArrayObject::class,
    ];

}
