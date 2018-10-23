<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    protected $table = 'product_sizes';

    public function productShops()
    {
        return $this->hasMany(ProductShop::class);
    }

    public function billProducts()
    {
        return $this->hasMany(BillProduct::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
