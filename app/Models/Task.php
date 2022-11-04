<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\UUID;

class Task extends Model
{
    use UUID;
    use HasFactory, SoftDeletes;

    protected $table = 'tasks';
    protected $primaryKey = 'id';

    public $timestamps = true;
    
    protected $fillable = [
        'name',
        'priority',
        'assigned_to',
        'affiliated_client',
        'deadline',
    ];

    protected $dates = ['deleted_at', 'updated_at', 'created_at', 'deadline'];

}
