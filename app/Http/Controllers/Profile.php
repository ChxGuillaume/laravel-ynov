<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class Profile extends Controller
{

    /**
     * Show user profile
     *
     * @return Factory|RedirectResponse|View
     */
    public static function Show() {
        if (!auth()->user()) return redirect()->route('home');

        return view('profile', ['user' => auth()->user()]);
    }

    /**
     * Define a user password (page)
     *
     * @return Factory|RedirectResponse|View
     */
    public static function DefinePassword() {
        if (!auth()->user()) return redirect()->route('home');
        if (auth()->user()->hasPassword) return redirect()->route('profile');

        return view('define-password', ['user' => auth()->user()]);
    }

    /**
     * Define a user password (action)
     *
     * @param Request $request
     * @return Factory|RedirectResponse|View
     */
    public static function DefinePasswordPost(Request $request) {
        if (!auth()->user()) return redirect()->route('home');
        if (auth()->user()->hasPassword) return redirect()->route('profile');

        $password = $request->get('password');
        $passwordReap = $request->get('passwordReap');

        if (!is_null($password) & !is_null($passwordReap) & ($password === $passwordReap)) {
            auth()->user()->fill([
                'password' => Hash::make($password),
                'hasPassword' => 1,
            ])->save();

            return redirect()->route('profile');
        }

        return view('define-password', ['user' => auth()->user()]);
    }

    /**
     * Redefine a user password (page)
     *
     * @return Factory|RedirectResponse|View
     */
    public static function ReDefinePassword() {
        if (!auth()->user()) return redirect()->route('home');

        return view('redefine-password', ['user' => auth()->user()]);
    }

    /**
     * Redefine a user password (action)
     *
     * @param Request $request
     * @return Factory|RedirectResponse|View
     */
    public static function ReDefinePasswordPost(Request $request) {
        if (!auth()->user()) return redirect()->route('home');

        $oldPassword = $request->get('oldPassword');
        $password = $request->get('password');
        $passwordReap = $request->get('passwordReap');

        if (Hash::check($oldPassword, auth()->user()->getAuthPassword())
            & !is_null($password) & !is_null($passwordReap) & ($password === $passwordReap)) {
            auth()->user()->fill([
                'password' => Hash::make($password),
                'hasPassword' => 1,
            ])->save();

            return redirect()->route('profile');
        }

        return view('redefine-password', ['user' => auth()->user()]);
    }
}
