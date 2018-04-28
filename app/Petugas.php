<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Petugas extends User
{
    protected $table = "petugas";
    protected $fillable = [
        "nama",
        "username",
        "password",
        "remember_token"
    ];
}
