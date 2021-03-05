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
route::get('trangchu','SanphamConTroller@sanpham');
route::get('thietbi','SanphamConTroller@sanpham');
route::get('chitietthietbi/{id}','SanphamConTroller@chitietsanpham')->name('chitietthietbi');