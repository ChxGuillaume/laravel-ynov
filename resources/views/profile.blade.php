@extends('layouts.app')

@section('title', 'Profile')

@section('body')
    <div class="top-right links">
        <a href="{{ route('home') }}">Home</a>

        @if (Route::has('disconnect'))
            <a href="{{ route('disconnect') }}">Disconnect</a>
        @endif
    </div>

    <div class="content">
        <div class="title m-b-md">
            Profile
        </div>

        <ul>
            <li><strong>Name</strong>: {{ $user->name }}</li>
            <li><strong>Email</strong>: {{ $user->email }}</li>
        </ul>

        @if (!$user->hasPassword)
            <a class="btn" href="{{ route('definePassword') }}">Create Password</a>
        @else
            <a class="btn" href="{{ route('reDefinePassword') }}">Edit Password</a>
        @endif
    </div>
@endsection
