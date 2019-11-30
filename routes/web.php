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

Route::get('/', function () {
    return view('auth.login');
});



Auth::routes();
Route::prefix('/home')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
	Route::get('/pages/{link}','HomeController@dinapages');
	Route::post('/pages/{link}','HomeController@svdinapages');
	Route::put('/pages/menu/update/{id}','HomeController@updinapages');
	Route::delete('/pages/menu/delete/{id}','HomeController@dldinapages');


	Route::get('/pages/1/{link}','HomeController@vdinapages');
	Route::get('/pages/1/vreviewpesanan/aa','HomeController@vvdinapages');
	Route::post('/pages/save/pesanan','HomeController@svpesanan');
	Route::post('/pages/bayar/pesanan','HomeController@bypesanan');
	Route::put('/pages/update/pesanan/{id}','HomeController@uuppesanan');
	Route::delete('/pesanan/delete/{id}','HomeController@dlpesanan');

	Route::get('/pages/laporan/faktur','HomeController@faktur');
	Route::get('/pages/laporan/harian','HomeController@harian');
	Route::get('/pages/laporan/bulanan','HomeController@bulanan');
	Route::get('/pages/laporan/tahunan','HomeController@tahunan');
	Route::get('/cetak/faktur/{id}','HomeController@cetak');


	Route::get('/edit/user/root', 'HomeController@getuser');
	Route::put('/edit/user/root/{id}', 'HomeController@upuser');
});

