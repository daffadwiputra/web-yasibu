<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name', 
        'price', 
        'size', 
        'product_image',
        'description',
        'sold_out'
    ];
}
