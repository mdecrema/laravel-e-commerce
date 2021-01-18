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

Route::get('/', 'LandingPageController@index')->name('index');

Auth::routes();

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    // Admin Landing Page
    Route::get('/dashboard', 'ProductController@index')->name('dashboard');
    // Products -> all 
    Route::get('/dashboard/products/all', 'ProductController@productsAll')->name('products.all');
    // Product Create
    Route::get('/dashboard/products/create', 'ProductController@create')->name('products.create');
    // Product Store
    Route::post('/dashboard/products/create', 'ProductController@store')->name('products.store');
    // Product Show
    //Route::get('/new/product/show/{id}', 'ProductController@show')->name('product.show');
    // Product Update
    Route::get('/dashboard/products/edit/{id}', 'ProductController@edit')->name('products.edit');
    // Product Update
    Route::post('/dashboard/products/update/{id}', 'ProductController@update')->name('products.update');

});

// Landing Page
Route::get('/home', 'HomeController@index')->name('home');

// Products
Route::resource('/tshirt', 'TshirtController');
Route::resource('/hoodies', 'HoodiesController');

// Product Show 
Route::get('/product/show/{id}', 'TshirtController@show')->name('item-details');

// Cart
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart', 'CartController@store')->name('cart.store');
Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');

// Check-out 
Route::get('/payment/checkout', 'CheckoutController@index')->name('checkout.index');
Route::post('/payment/completed/success', 'CheckoutController@checkout')->name('checkout.checkout');
Route::post('/success','CheckoutController@afterpayment')->name('checkout.completed');
