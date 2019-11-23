<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\User;

class LiveAuth extends Controller
{

    public static function Login() {
        return Socialite::driver('live')->redirect();
    }

    public static function Authentification()
    {
        try {
            $user = Socialite::with('live')->user();
        } catch (\Exception $e) {
            return redirect()->route('home');
        }

        if (User::where('live_id', $user->id)->count() > 0) {
            $loggedUser = User::where('live_id', $user->id)->first();
        } else if (preg_match('/.*\..*@ynov\.com/', $user->email)) {
            $loggedUser = User::create([
                'live_id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ]);
        } else return redirect()->route('home');

        auth()->login($loggedUser, true);

        return redirect()->route('profile');
    }
}
