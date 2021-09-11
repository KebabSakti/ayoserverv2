<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bundle extends Model
{
    use HasFactory;

    protected $guarded = [];

    // protected $with = ['product_bundles'];

    public function product_bundles()
    {
        return $this->hasMany(\App\Models\ProductBundle::class, 'bundle_id', 'bundle_id');
    }
}
