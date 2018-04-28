<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = [
        'name', 
        'address', 
        'phone_number', 
        'email',
        'goods_name',
        'cover_image',
        'description'
    ];
}
