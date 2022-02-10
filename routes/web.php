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
    return redirect('Berandas');
});

Route::group(['middleware'=>'auth'],function(){
    // Route::get('beranda','Beranda_controller@index');
    Route::resource('Berandas', 'Beranda_controlller');
    Route::resource('paket', 'Paket_controller');
    Route::resource('customer', 'CustomerController');
    Route::resource('statuspesanan', 'statusPesananController');
    Route::resource('statuspembayaran', 'statusPembayaranController');
    Route::resource('transaksipesanan', 'transaksiPesananController');
});

Auth::routes();

Route::get('/home', function(){
    return redirect('Berandas');
});

Route::get('keluar', function(){
    \Auth::logout();
    return redirect('login');
});