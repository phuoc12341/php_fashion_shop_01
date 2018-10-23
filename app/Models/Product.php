<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function productShops()
    {
        return $this->hasMany(ProductShop::class);
    }

    public function productColors()
    {
        return $this->hasMany(ProductColor::class);
    }

    public function productSizes()
    {
        return $this->hasMany(ProductSize::class);
    }

    public function productPromotions()
    {
        return $this->hasMany(ProductPromotion::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function billProducts()
    {
        return $this->hasMany(BillProduct::class);
    }
}
