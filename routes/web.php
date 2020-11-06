<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/blog', 'PostController@index');
Route::get('/blog/{slug}', ['as' => 'post', 'uses' => 'PostController@show'])->where('slug', '[A-Za-z0-9-_]+');


Route::middleware(['auth'])->group(function () {
    Route::get('/blog/createPost', 'PostController@create');
    Route::post('/blog/createPost', 'PostController@store');
    Route::get('/blog/editPost/{slug}', 'PostController@edit');
    Route::post('/blog/updatePost', 'PostController@update');
    Route::get('/blog/deletePost/{id}', 'PostController@destroy');
});
