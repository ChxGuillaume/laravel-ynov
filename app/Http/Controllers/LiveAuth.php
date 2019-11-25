<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\User;

class LiveAuth extends Controller
{

    public function login() {
        return Socialite::driver('live')->redirect();
    }

    public function authentification()
    {
        try {
            $liveUser = Socialite::with('live')->user();
        } catch (\Exception $e) {
            return redirect()->route('home');
        }

        if (!preg_match('/.*\..*@ynov\.com/', $liveUser->email)) {
            return redirect()->route('home');
        }

        $loggedUser = User::firstOrCreate([
            'live_id' => $liveUser->id
        ], [
            'name' => $liveUser->name,
            'email' => $liveUser->email,
        ]);

        auth()->login($loggedUser, true);

        return redirect()->route('profile');
    }
}
