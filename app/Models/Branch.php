<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = 'branchs';

    public function shops()
    {
        return $this->hasMany(Shop::class);
    }
}
