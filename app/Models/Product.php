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
        return $this->hasOne(ProductCategory::class,'id','category_id');
    }
    public function product_manufacturers()
    {
        return $this->hasOne(ProductManufacturer::class,'id','manufacturer_id');
    }
    public function product_suppliers()
    {
        return $this->hasOne(ProductSupplier::class,'id','supplier_id');
    }
}
