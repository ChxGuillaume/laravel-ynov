<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Auth extends Controller
{

    public static function disconnect()
    {
        auth()->logout();

        return redirect()->route('home');
    }

}
