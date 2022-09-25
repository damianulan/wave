<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\UUID;

class Service extends Model
{
    use UUID;
    use HasFactory, SoftDeletes;

    protected $table = 'services';
    protected $primaryKey = 'id';

    public $timestamps = true;
    
    protected $fillable = [
        'name',
        'price',
        'price_short_min',
        'price_short_max',
        'price_medium_min',
        'price_medium_max',
        'price_long_min',
        'price_long_max',
        'time',
        'gender',
        'description',
        'added_by'
    ];
}