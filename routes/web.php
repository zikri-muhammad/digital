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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// kategori produk
// Route::get('/kategori-produk//{id}', 'KategoriProdukController@edit')->name('kategori-produk');
Route::resource('kategori-produk', 'KategoriProdukController');

// produk
Route::resource('/produks', 'ProdukController');

// transaksion 
Route::resource('/transaksions', 'TransaksionController');
Route::get('transaksions/{id}/transaksionDetail', 'TransaksionController@transaksionDetail')
    ->name('transaksions.transaksionDetail');
