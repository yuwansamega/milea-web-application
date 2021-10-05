<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\WSController;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminVerifikasiController;


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
Route::get('/riwayat', function () {
    return view('riwayat');
});



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

//For Booth
Route::group(['middleware' => ['auth']], function(){
    Route::get('/dashboard', [PanelController::class, 'index'])->name('dashboard');
    // Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');
    
});

//For User
Route::group(['middleware' => ['auth', 'role:user']], function(){
    Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');
    Route::get('/daftar-kegiatan', [WSController::class, 'index'])->name('daftar-kegiatan');
    Route::get('/data-profil', [DataUserController::class, 'index'])->name('data-profil');
    Route::get('/lengkapi-profil', [DataUserController::class, 'show'])->name('lengkapi-profil');
    Route::post('/update-data-diri/{id}', [DataUserController::class, 'update']);
    Route::get('/detail-kegiatan/{id}', [WSController::class, 'detail']);
    Route::post('/update_submission/{id}', [WSController::class, 'store_by_id']);
    
    
    });
    


//For Admin
Route::group(['middleware' => ['auth', 'role:admin']], function(){
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/verifikasi', [AdminVerifikasiController::class, 'index'])->name('admin.verifikasi');
    
});

require __DIR__.'/auth.php';