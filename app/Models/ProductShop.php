<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductShop extends Model
{
    protected $table = 'product_shop';

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function productColor()
    {
        return $this->belongsTo(ProductColor::class)
    }

    public function productSize()
    {
        return $this->belongsTo(ProductSize::class);
    }
}
