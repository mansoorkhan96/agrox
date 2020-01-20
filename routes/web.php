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

use App\Library\MCart;
use Illuminate\Support\Facades\Session;


Route::get('/handleAuth', 'HandleAuthController@index');

Route::get('/', 'PagesController@home')->name('home');
Route::get('/about', 'PagesController@about')->name('pages.about');
Route::get('/contact', 'PagesController@contact')->name('pages.contact');
Route::get('/message', 'PagesController@message')->name('pages.message');

Route::get('/forum', 'ForumController@index')->name('forum.index');
Route::get('/forum/{post}', 'PostsController@show')->name('forum.show');

Route::post('/like/{post}', 'BlogController@like')->name('blog.like');

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

Route::get('/reviews', 'ReviewsController@index')->name('review.index');

Route::get('/test', function() {
    return count(MCart::content());
});

Route::get('/dashboard/admin', 'AdminController@index')->name('admin.index');
Route::get('/dashboard/farmer', 'FarmerController@index')->name('farmer.index');
Route::get('/dashboard/consultant', 'ConsultantController@index')->name('consultant.index');
Route::get('/dashboard/academic', 'AcademicController@index')->name('academic.index');

Route::resource('/dashboard/categories', 'CategoriesController');

Route::get('/dashboard/users', 'UsersController@index')->name('users.index');
Route::get('/dashboard/users/trashed', 'UsersController@trashed')->name('users.trashed');
Route::delete('/dashboard/users/{user}', 'UsersController@destroy')->name('users.destroy');
Route::put('/dashboard/users/{user}', 'UsersController@restore')->name('users.restore');

Route::get('/dashboard/products/products', 'ProductsController@products');
Route::get('/dashboard/products/trashed', 'ProductsController@trashed');
Route::put('/dashboard/products/restore/{product}', 'ProductsController@restore');
Route::resource('/dashboard/products', 'ProductsController');

Route::get('/dashboard/orders/rejected', 'OrderController@rejected')->name('orders.rejected');
Route::get('/dashboard/orders', 'OrderController@index')->name('orders.index');
Route::get('/dashboard/orders/{order}', 'OrderController@show')->name('orders.show');
Route::put('/dashboard/orders/{order}', 'OrderController@complete')->name('orders.complete');
Route::delete('/dashboard/orders/{order}', 'OrderController@reject')->name('orders.reject');
Route::put('/dashboard/orders/restore/{order}', 'OrderController@restore')->name('orders.restore');

Route::get('/dashboard/posts/trashed', 'PostsController@trashed');
Route::put('/dashboard/posts/restore/{post}', 'PostsController@restore');
Route::post('/dashboard/create-comment/{post}', 'PostsController@createComment')->name('post.createcomment');
Route::delete('/dashboard/delete-comment/{post}', 'PostsController@deleteComment')->name('post.deletecomment');
Route::resource('/dashboard/posts', 'PostsController');

Route::resource('/dashboard/consultancies', 'ConsultancyController');
Route::put('/dashboard/consultancies/reject/{consultancy}', 'ConsultancyController@reject')->name('consultancies.reject');
Route::put('/dashboard/consultancies/accept/{consultancy}', 'ConsultancyController@accept')->name('consultancies.accept');

Route::post('/dashboard/private-message', 'PrivateMessageController@store')->name('message.store');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


// OAuth Routes
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
