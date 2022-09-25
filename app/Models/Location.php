<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\UUID;

class Location extends Model
{
    use UUID;
    use HasFactory, SoftDeletes;

    protected $table = 'locations';
    protected $primaryKey = 'id';

    public $timestamps = true;
    
    protected $fillable = [
        'name',
        'address',
        'zip',
        'city',
        'country',
        'google',
        'facebook',
        'instagram',
    ];}
