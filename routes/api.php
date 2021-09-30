<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('register','Api\UserController@register');

Route::group(['middleware'=>'auth:api'],function()
{
	Route::get('user/detail','Api\UserController@details');
	Route::post('logout', 'Api\UserController@logout');

});

Route::get('produk','produk@index');
Route::get('produk','produk@create');
Route::get('/produk/{id}','produk@update');
Route::get('/produk/{id}','produk@delete');
