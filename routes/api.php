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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/barang', 'BarangController@all');
Route::get('/barang/{id}', 'BarangController@show');
Route::post('/barang', 'BarangController@store');
Route::put('/barang/{id}', 'BarangController@update');
Route::delete('/barang/{id}', 'BarangController@delete');

Route::get('/pembelian', 'PembelianController@all');
Route::get('/pembelian/{id}', 'PembelianController@show');
Route::post('/pembelian', 'PembelianController@store');
Route::put('/pembelian/{id}', 'PembelianController@update');
Route::delete('/pembelian/{id}', 'PembelianController@delete');

Route::get('/barang/{id}', 'PembelianController@getBarang');