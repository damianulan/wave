<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\UUID;


class Calendar extends Model
{
    use HasFactory, UUID, SoftDeletes;

    protected $table = 'calendars';
    protected $primaryKey = 'id';

    public $timestamps = true;
    
    protected $fillable = [

    ];
}
