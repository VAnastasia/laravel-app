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
        Route::get('/all', 'PostController@getUserPosts')->middleware('auth')->name('posts');
        Route::get('/add', 'PostController@create')->middleware('auth')->name('add');
        Route::post('/add/submit', 'PostController@submit')->middleware('auth')->name('post-submit');
        Route::get('/{id}', 'PostController@getPost')->name('post');
        Route::get('/edit/{id}', 'PostController@editPost')->middleware('auth')->name('post-edit');
        Route::get('/public/{id}', 'PostController@publicPost')->middleware('auth')->name('post-public');
        Route::post('/save/{id}', 'PostController@savePost')->middleware('auth')->name('post-save');
        Route::get('/like/{id}', 'PostController@likePost')->middleware('auth')->name('like-post');
    }
);

Route::group(['prefix' => 'comment'],
    function () {
        Route::post('/submit', 'CommentController@submit')->middleware('auth')->name('comment-submit');
        Route::get('/delete/{id}', 'CommentController@deleteComment')->middleware('auth')->name('comment-delete');
        Route::get('/edit/{id}', 'CommentController@editComment')->middleware('auth')->name('comment-edit');
        Route::post('/save/{id}', 'CommentController@saveComment')->middleware('auth')->name('comment-save');
        Route::get('/like-comment/{id}', 'CommentController@likeComment')->middleware('auth')->name('like-comment');
    }
);

Route::get('/tag/{tag}', 'PostController@getTagPosts')->name('tag-posts');

