<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class ProductCategory extends Model
{
    use UUID;
    use HasFactory;

    protected $table = 'product_categories';
    protected $primaryKey = 'id';

    public $timestamps = true;
}
