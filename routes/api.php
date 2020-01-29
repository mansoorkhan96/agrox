<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/home', 'API\ApiPagesController@home');

Route::get('shop/list', 'API\ApiShopController@shopList');
Route::get('shop/grid', 'API\ApiShopController@shopGrid');

Route::resource('shop', 'API\ApiShopController');


Route::resource('blog', 'API\ApiBlogController');

