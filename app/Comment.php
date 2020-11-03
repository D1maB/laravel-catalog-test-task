<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    public function product(){
        return  $this->belongsTo(Product::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_verified', true);
    }
}
