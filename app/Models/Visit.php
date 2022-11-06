<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\UUID;

class Visit extends Model
{
    use UUID;
    use HasFactory, SoftDeletes;

    protected $table = 'visits';
    protected $primaryKey = 'id';

    public $timestamps = true;
    
}
