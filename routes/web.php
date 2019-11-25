<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\User;

Route::get('/', function () {
    return view('welcome');
})->name('home');

//Route::get('/users', function () {
//    return [
//        'users' => User::all(['name', 'email']),
//    ];
//});
//
//Route::delete('/users/{user}', function (User $user) {
//    $user->delete();
//    return response(null, 204);
//});

Route::get('/login-live', 'LiveAuth@login')->name('login-live');
Route::get('/auth-live', 'LiveAuth@authentification');

Route::get('/profile', 'Profile@show')->name('profile');
Route::get('/profile/define-password', 'Profile@definePassword')->name('definePassword');
Route::post('/profile/define-password', 'Profile@definePasswordPost')->name('definePasswordPost');
Route::get('/profile/redefine-password', 'Profile@reDefinePassword')->name('reDefinePassword');
Route::post('/profile/redefine-password', 'Profile@reDefinePasswordPost')->name('reDefinePasswordPost');

Route::get('/disconnect', 'Auth@disconnect')->name('disconnect');

