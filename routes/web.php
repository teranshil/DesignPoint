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
Route::middleware('auth')->group(function (){
    Route::get('/', 'HomeController@index')->name('home');
    Route::post('/filter', 'HomeController@filter')->name('home.filter');
    Route::get('/product', 'ProductController@index')->name('product.view');
    Route::post('/product', 'ProductController@store')->name('product.store');
    Route::put('/product/{id}', 'ProductController@update')
        ->where('id', '[0-9]+')
        ->name('product.update');
    Route::delete('/product', 'ProductController@destroy')->name('product.remove');
});

Route::namespace('Auth')->group(function () {

    Route::get('/register', 'RegisterController@showRegistrationForm')->name('register.view');
    Route::post('/register', 'RegisterController@register')->name('register');

    Route::get('/login', 'LoginController@showLoginForm')->name('login.view');
    Route::post('/login', 'LoginController@login')->name('login');
    Route::get('/logout', 'LoginController@logout')->name('logout');
});

