<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
