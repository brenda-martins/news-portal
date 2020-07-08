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


/**
 * Authors
 */

Route::namespace('Authors')->group(function () {

    Route::get('autor', 'AuthorController@index')->name('author.index');
    Route::get('autor/login', 'AuthController@showFormLogin')->name('autor.login');
    Route::post('author/login', 'AuthController@login')->name('author.login');
    Route::post('author/logout', 'AuthController@logout')->name('author.logout');

    /**
     * Posts
     */
    Route::get('autor/postagem', 'PostController@index')->name('author.post.list');
    Route::get('autor/postagem/nova', 'PostController@create')->name('author.post.create');
    Route::post('author/post/store', 'PostController@store')->name('author.post.store');
    Route::get('autor/postagem/{post}/editar', 'PostController@edit')->name('author.post.edit');
    Route::put('author/post/{post}', 'PostController@update')->name('author.post.update');
    Route::delete('author/post/{post}', 'PostController@destroy')->name('author.post.destroy');
});


/**
 * Admin
 */
Route::namespace('Admin')->group(function () {

    /**
     * Admin
     */
    Route::get('admin', 'Admin@index')->name('admin.index');
    Route::get('admin/login', 'AuthController@showFormLogin')->name('admin.login');
    Route::post('admin/login', 'AuthController@login')->name('admin.login');
    Route::post('admin/logout', 'AuthController@logout')->name('admin.logout');


    /**
     * Categories
     */
    Route::get('admin/categorias', 'CategoryController@index')->name('admin.category.list');
    Route::post('/category/store', 'CategoryController@store')->name('admin.category.store');
});
