<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminUsersController;

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

Route::get('/', 'HomeController@index');

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/post/{id}', 'HomeController@post')->name('home.post');

Route::get('/store', 'AdminUsersController@store');

Route::group(['middleware'=> 'admin'], function(){
    Route::get('/admin', 'AdminController@index');

    Route::resource('admin/users', 'AdminUsersController');
    Route::resource('admin/posts', 'AdminPostsController');
    Route::resource('admin/categories', 'AdminCategoriesController');
    Route::delete('admin/delete/media', 'AdminMediaController@deleteMedia')->name('del');
    Route::resource('admin/media', 'AdminMediaController');
    // Route::get('admin/media/upload', 'AdminMediaController@store')->name('media.upload');
    Route::resource('admin/comments', 'PostCommentController');
    Route::resource('admin/comment/replies', 'CommentRepliesController');
});


Route::group(['middleware'=> 'auth'], function(){

    Route::post('comment/reply', 'CommentRepliesController@createReply')->name('replies.createReply');
});
