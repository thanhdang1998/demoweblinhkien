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

/* Route::get('/', function () {
    return view('welcome');
}); */
route::get('/','SanphamConTroller@sanpham');
route::get('chitietthietbi/{id}','SanphamConTroller@chitietsanpham')->name('chitietthietbi');
route::post('themgiohang','SanphamConTroller@themgiohang')->name('themgiohang');
route::get('giohang','SanphamConTroller@giohang');
route::post('capnhatsoluong','SanphamConTroller@capnhatsoluong')->name('capnhatsoluong');
route::get('xoasanpham/{id}','SanphamConTroller@xoasanpham')->name('xoasanpham');
route::get('thanhtoan','SanphamConTroller@thanhtoan');

route::get('tintuc','TintucController@tintuc');
route::get('chitiettintuc/{id}','TintucController@chitiettintuc');

route::get('lienhe','LienheController@lienhe');