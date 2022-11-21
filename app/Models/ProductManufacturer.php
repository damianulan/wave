<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\UUID;

class ProductManufacturer extends Model
{
    use UUID;
    use HasFactory, SoftDeletes;

    protected $table = 'product_manufacturers';
    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'added_by',
    ];
}
