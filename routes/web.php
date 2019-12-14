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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route provided by Laravel authentication
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// Route from home page, to get the Flower Controller index function
Route::get('/', 'PagesController@index');

// Route from profile link to UsersController show function
Route::get('/profile', 'UsersController@show')->middleware('auth');

// Route from transaction history link to TransactionsController index function
Route::get('/transactions', 'TransactionsController@index');

// Route to map the UsersController resources to Views users and related action
Route::resource('users', 'UsersController');

// Route to map the FlowerTypesController resources to Views flower_types
Route::resource('flower_types', 'FlowerTypesController');

// Route to map the CouriersController resources to Views couriers
Route::resource('couriers', 'CouriersController');

// Route to map the FlowersController resources to Views flowers and related action
Route::resource('flowers', 'FlowersController');

// Route to map the CartsController resources to Views carts and related action
Route::resource('carts', 'CartsController');