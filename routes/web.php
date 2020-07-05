<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
// use source\controllers\Auth;

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


/**
 * Web
 */
Route::namespace('Web')->group(function () {
    Route::get('/',  'Web@index')->name("web.index");
    Route::get('/notica/{post}/{slug}', 'PostController@show')->name('web.post.show');
});

Auth::routes();

Route::namespace('Admin')->prefix('admin')->group(function () {

    /**
     * Admin
     */
    Route::get('/', 'Admin@index')->name('admin.index');

    /**
     * Categories
     */
    Route::get('/categorias', 'CategoryController@index')->name('admin.category.index');
    Route::post('/category/store', 'CategoryController@store')->name('admin.category.store');


    /**
     * Posts
     */
    Route::get('/postagem', 'PostController@index')->name('admin.post.index');
    Route::get('/postagem/nova', 'PostController@create')->name('admin.post.create');
    Route::post('/post/store', 'PostController@store')->name('admin.post.store');
    Route::get('/postagem/{post}/editar', 'PostController@edit')->name('admin.post.edit');
    Route::put('/post/{post}', 'PostController@update')->name('admin.post.update');
    Route::delete('/post/{post}', 'PostController@destroy')->name('admin.post.destroy');
});
