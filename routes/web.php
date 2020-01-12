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
Route::get('/message', 'PagesController@message')->name('pages.message');

Route::resource('blog', 'BlogController');
Route::post('/rating/{post}', 'PostRating@store')->name('postRating.store');
Route::post('/create-comment/{post}', 'BlogController@createComment')->name('comment.create');

Route::get('/shop/list', 'ShopController@shopList')->name('shop.list');
Route::get('/shop/grid', 'ShopController@shopGrid')->name('shop.grid');
Route::resource('shop', 'ShopController');
Route::post('/product-rating/{product}', 'ShopController@storeRating')->name('productRating.store');
Route::post('/product-review/{product}', 'ShopController@createReview')->name('product.review');

Route::get('/my-orders', 'ShopController@orders')->name('order.index');
Route::get('/my-order/{order}', 'ShopController@showOrder')->name('order.show');
Route::put('/my-order/{order}', 'ShopController@updateOrder')->name('order.update');


Route::resource('cart', 'CartController');

Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');

Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::put('/profile/{user}', 'ProfilesController@update')->name('profile.update');
Route::get('/profile/{user}', 'ProfilesController@show')->name('profile.show');

Route::post('/reviews', 'ReviewsController@store')->name('review.store');


Route::get('/admin', function () {
    return view('admin.index');
});

Route::resource('/admin/categories', 'CategoriesController');

Route::get('/admin/products/products', 'ProductsController@products');
Route::get('/admin/products/trashed', 'ProductsController@trashed');
Route::put('/admin/products/restore/{product}', 'ProductsController@restore');
Route::resource('/admin/products', 'ProductsController');

Route::get('/admin/orders/rejected', 'OrderController@rejected')->name('orders.rejected');
Route::get('/admin/orders', 'OrderController@index')->name('orders.index');
Route::get('/admin/orders/{order}', 'OrderController@show')->name('orders.show');
Route::put('/admin/orders/{order}', 'OrderController@complete')->name('orders.complete');
Route::delete('/admin/orders/{order}', 'OrderController@reject')->name('orders.reject');
Route::put('/admin/orders/restore/{order}', 'OrderController@restore')->name('orders.restore');

Route::get('/admin/posts/trashed', 'PostsController@trashed');
Route::put('/admin/posts/restore/{product}', 'PostsController@restore');
Route::resource('/admin/posts', 'PostsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// OAuth Routes
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
