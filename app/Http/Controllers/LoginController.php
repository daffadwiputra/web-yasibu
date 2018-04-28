<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function username(){
        return 'username';
    }

    protected function authenticated(Request $request, $user)
    {
        return redirect('/donations');
    }
}
