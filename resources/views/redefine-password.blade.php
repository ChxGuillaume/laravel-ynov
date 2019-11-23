@extends('layouts.app')

@section('title', 'Redefine Password')

@section('body')
    <div class="top-right links">
        <a href="{{ route('home') }}">Home</a>

        @if (Route::has('profile'))
            <a href="{{ route('profile') }}">Profile</a>
        @endif

        @if (Route::has('disconnect'))
            <a href="{{ route('disconnect') }}">Disconnect</a>
        @endif
    </div>

    <div class="content">
        <div class="title m-b-md">
            Setup your password
        </div>

        <form method="post" action="{{ route('reDefinePasswordPost') }}">
            <ul>
                <li>
                    <label for="oldPassword">Old Password</label>:
                    <input id="oldPassword" type="password" name="oldPassword">
                </li>
                <li>
                    <label for="password">New Password</label>:
                    <input id="password" type="password" name="password">
                </li>
                <li>
                    <label for="passwordReap">Repeat Password</label>:
                    <input id="passwordReap" type="password" name="passwordReap">
                </li>
            </ul>

            {{ csrf_field() }}
            <button class="btn" type="submit">Set my Password</button>
        </form>
    </div>
@endsection
