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

Route::get('/', 'PostController@show')->name('main');

Route::get('/popular', 'PostController@popular')->name('popular');
Route::get('/posts', 'PostController@getUserPosts')->name('posts');

Route::get('/add', 'PostController@create')->middleware('auth')->name('add');

Route::get('/registration', function () {
    return view('registration');
})->middleware('guest')->name('registration');

Route::get('/auth', function () {
    return view('auth');
})->middleware('guest')->name('auth');

Route::get('/post/{id}', 'PostController@getPost')->name('post');
Route::get('/edit/{id}', 'PostController@editPost')->name('post-edit');
Route::get('/public/{id}', 'PostController@publicPost')->name('post-public');

Route::post('/registration/submit', 'RegistrationController@submit')->middleware('guest')->name('registration-form');
Route::post('/auth/signin', 'AuthController@signin')->middleware('guest')->name('signin');
Route::get('/auth/logout', 'AuthController@logout')->name('logout');

Route::post('/add/submit', 'PostController@submit')->name('post-submit');
Route::post('/save/{id}', 'PostController@savePost')->name('post-save');

Route::post('/comment/submit', 'CommentController@submit')->name('comment-submit');
Route::get('/comment/delete/{id}', 'CommentController@deleteComment')->name('comment-delete');
Route::get('/comment/edit/{id}', 'CommentController@editComment')->name('comment-edit');
Route::post('/comment/save/{id}', 'CommentController@saveComment')->name('comment-save');

Route::get('/tag/{tag}', 'PostController@getTagPosts')->name('tag-posts');

