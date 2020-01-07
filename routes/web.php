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

Route::get('/', 'PagesController@home');

Route::get('/shop/list', 'ShopController@shopList')->name('shop.list');

Route::get('/shop/grid', 'ShopController@shopGrid')->name('shop.grid');

Route::resource('shop', 'ShopController');

Route::resource('cart', 'CartController');

Route::get('/admin', function () {
    return view('admin.index');
});

Route::resource('/admin/categories', 'CategoriesController');
Route::resource('/admin/products', 'ProductsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// OAuth Routes
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
