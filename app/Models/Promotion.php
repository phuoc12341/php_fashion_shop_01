<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $table = 'promotions';

    protected $fillable = [
        'description',
        'discount',
        'start_at',
        'end_at',
    ];

    public function productPromotions()
    {
        return $this->hasMany(ProductPromotion::class);
    }
}
