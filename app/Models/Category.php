<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name', 
        'parent_id',
        'slug',
        'priority',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
