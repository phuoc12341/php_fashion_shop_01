<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $table = 'shops';

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function productShops()
    {
        return $this->hasMany(ProductShop::class);
    }
}
