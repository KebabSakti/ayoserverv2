<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductBundle extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['product'];

    public function product()
    {
        return $this->hasOne(\App\Models\Product::class, 'product_id', 'product_id');
    }
}
