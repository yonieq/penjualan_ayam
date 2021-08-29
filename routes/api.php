<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Auth::routes(['verify' => true]);

Route::get('product', 'Api\ProductController@get');
Route::get('category', 'Api\CategoriesController@get');
Route::get('alamat/{id}', 'Api\AlamatController@get');
Route::post('alamat/{id}', 'Api\AlamatController@post');
Route::put('alamat/{id}', 'Api\AlamatController@update');
Route::get('alamat_ubah/{id}', 'Api\AlamatController@ubah');

Route::post('login', 'Api\LoginController@login');
Route::post('register', 'Api\RegisterController@register');

Route::get('keranjang/{id}', 'Api\KeranjangController@get');
Route::get('keranjang/{id}/tambah', 'Api\KeranjangController@tambah');
Route::get('keranjang/{id}/kurang', 'Api\KeranjangController@kurang');
Route::delete('keranjang/{id}', 'Api\KeranjangController@delete');

Route::post('keranjang/{id}', 'Api\KeranjangController@post');

Route::get('order/{id}', 'Api\OrderController@get');
Route::post('order/{id}', 'Api\OrderController@post');

Route::get('checkout/{id}','Api\CheckoutController@get');

Route::get('user/{id}', 'Api\UserController@get');