<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPromotion extends Model
{
    protected $table = 'product_promotion';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }
}
