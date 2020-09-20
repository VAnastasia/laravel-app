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

Route::group(['prefix' => 'registration'],
    function () {
        Route::get('/', function () {
            return view('registration');
        })->middleware('guest')->name('registration');

        Route::post('/submit', 'RegistrationController@submit')->middleware('guest')->name('registration-form');
    }
);


Route::group(['prefix' => 'auth'],
    function () {
        Route::get('/', function () {
                return view('auth');
            })->middleware('guest')->name('auth');
        Route::post('/signin', 'AuthController@signin')->middleware('guest')->name('signin');
        Route::get('/logout', 'AuthController@logout')->name('logout');
    }
);

Route::group(['prefix' => 'post'],
    function () {
        Route::get('/popular', 'PostController@popular')->name('popular');
        Route::get('/all', 'PostController@getUserPosts')->name('posts');
        Route::get('/add', 'PostController@create')->middleware('auth')->name('add');
        Route::post('/add/submit', 'PostController@submit')->name('post-submit');
        Route::get('/{id}', 'PostController@getPost')->name('post');
        Route::get('/edit/{id}', 'PostController@editPost')->name('post-edit');
        Route::get('/public/{id}', 'PostController@publicPost')->name('post-public');
        Route::post('/save/{id}', 'PostController@savePost')->name('post-save');
        Route::get('/like/{id}', 'PostController@likePost')->name('like-post');
    }
);

Route::group(['prefix' => 'comment'],
    function () {
        Route::post('/submit', 'CommentController@submit')->name('comment-submit');
        Route::get('/delete/{id}', 'CommentController@deleteComment')->name('comment-delete');
        Route::get('/edit/{id}', 'CommentController@editComment')->name('comment-edit');
        Route::post('/save/{id}', 'CommentController@saveComment')->name('comment-save');
    }
);

Route::get('/tag/{tag}', 'PostController@getTagPosts')->name('tag-posts');
Route::get('/like/{id}', 'PostController@likePost')->name('like-post');


