<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'AuthController@getProfile')->name('main');

Route::get('/popular', function () {
    return view('popular');
})->name('popular');

Route::get('/add', function () {
    return view('add');
})->middleware('auth')->name('add');

Route::get('/registration', function () {
    return view('registration');
})->middleware('guest')->name('registration');

Route::get('/auth', function () {
    return view('auth');
})->middleware('guest')->name('auth');

Route::post('/registration/submit', 'RegistrationController@submit')->middleware('guest')->name('registration-form');
Route::post('/auth/signin', 'AuthController@signin')->middleware('guest')->name('signin');
Route::get('/auth/logout', 'AuthController@logout')->name('logout');

