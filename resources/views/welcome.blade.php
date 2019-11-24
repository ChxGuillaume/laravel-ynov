@extends('layouts.app')

@section('title', 'Home')

@section('body')
    @if (Route::has('login') || Route::has('login-live'))
        <div class="top-right links">
            @auth
                <a href="{{ route('profile') }}">Profile</a>

                @if (Route::has('disconnect'))
                    <a href="{{ route('disconnect') }}">Disconnect</a>
                @endif
            @else
                @if (Route::has('login'))
                    <a href="{{ route('login') }}">Login</a>
                @endif

                @if (Route::has('login-live'))
                    <a href="{{ route('login-live') }}">Login with Ynov</a>
                @endif

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            Laravel Ynov / JWT
        </div>

        <div class="links">
            <a target="_blank" href="https://guillaumechx.dev">Website</a>
            <a target="_blank" href="https://github.com/ChxGuillaume">GitHub</a>
        </div>
    </div>
@endsection
