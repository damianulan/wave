<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\UUID;

class Product extends Model
{
    use UUID;
    use HasFactory, SoftDeletes;

    protected $table = 'products';
    protected $primaryKey = 'id';

    public $timestamps = true;
    
    protected $fillable = [
        'name',
        'price',
        'price_net',
        'photo',
        'description',
        'category_id',
        'added_by'
    ];

    public function product_categories()
    {
        return $this->belongsToMany(ProductCategory::class,'product_categories');
    }
}
