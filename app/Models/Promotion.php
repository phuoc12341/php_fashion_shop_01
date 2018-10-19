<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $table = 'promotions';

    public function productPromotions()
    {
        return $this->hasMany(ProductPromotion::class);
    }
}
