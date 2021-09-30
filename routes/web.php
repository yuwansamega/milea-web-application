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
Route::get('/beranda', function () {
    return view('beranda');
});
Route::get('/data-profil', function () {
    return view('data-profil');
});
Route::get('/lengkapi-profil', function () {
    return view('lengkapi-profil');
});
Route::get('/daftar-kegiatan', function () {
    return view('daftar-kegiatan');
});
Route::get('/detail-kegiatan', function () {
    return view('detail-kegiatan');
});Route::get('/riwayat', function () {
    return view('riwayat');
});