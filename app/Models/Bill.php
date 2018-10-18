<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills';

    public function billProducts()
    {
        return $this->hasMany(BillProduct::class);
    }

    public function billStatus()
    {
        return $this->hasMany(BillStatus::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
