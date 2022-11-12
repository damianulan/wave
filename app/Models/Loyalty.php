<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\UUID;

class Loyalty extends Model
{
    use HasFactory, SoftDeletes, UUID;
    
    protected $table = 'loyalties';
    protected $primaryKey = 'id';

    public $timestamps = [ 'created_at', 'updated_at', 'deleted_at' ];
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        
    ];
}
