<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\WSController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDVerifikasiController;
use App\Http\Controllers\AdminVerifikasiController;
use App\Http\Controllers\MaterialController;


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
    return redirect('/login');
});



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
    Route::post('/update_submission/{id}', [SubmissionController::class, 'store_by_id']);
    Route::get('/riwayat', [SubmissionController::class, 'riwayat']);
    Route::get('/ubah-pass', [DataUserController::class, 'show_change_password']);
    Route::post('/update-pass', [DataUserController::class, 'update_password']);
    Route::get('/kelas', [MaterialController::class, 'show']);
    Route::post('/check-enroll-key', [MaterialController::class, 'check']);
    Route::get('/detail-kelas/{key}', [MaterialController::class, 'classDetail'])->name('class-detail');
    Route::delete('/delete-class/{id}', [MaterialController::class, 'deleteClass'])->name('user_classes.delete');
        
    });


    


//For Admin
Route::group(['middleware' => ['auth', 'role:admin']], function(){
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/verifikasi', [AdminVerifikasiController::class, 'index'])->name('admin.verifikasi');
    Route::get('/admin/verifikasi/detail/{data_sub_id}', [AdminDVerifikasiController::class, 'index']);
    Route::post('/admin/update-submissions/{data_sub_id}', [AdminDVerifikasiController::class, 'update']);
    Route::get('/admin/verifikasi/detail-payment/{data_sub_id}', [AdminDVerifikasiController::class, 'indexDetailPayment']);
    Route::post('/admin/update-submissions-payment/{sub_id}', [AdminDVerifikasiController::class, 'updateDetailPayment']);

    Route::get('/admin/pelatihan', [WSController::class, 'indexAdmin'])->name('admin.pelatihan');
    Route::get('/admin/pelatihan/{ws_id}', [WSController::class, 'indexWorkshopSub']);
    Route::get('/admin/pelatihan/update/{data_ws_id}', [WSController::class, 'indexUpdate'])->name('admin.pelatihan.update');
    Route::post('/admin/pelatihan/update/simpan/{data_ws_id}', [WSController::class, 'update']);

    Route::delete('/admin/pelatihan/delete/{id}', [WSController::class, 'delete']);
    
    Route::get('/admin/create/pelatihan', [WSController::class, 'indexAdminTambah']);
    Route::post('/admin/create/pelatihan', [WSController::class, 'store']);
    
    Route::get('/admin/pelatihan/tambah-materi/{ws_id}', [MaterialController::class, 'adminViewCreateMaterial'])->name('admin.pelatihan.tambah-materi');
    Route::post('/admin/pelatihan/tambah-materi', [MaterialController::class, 'adminStoreCreateMaterial']);
    Route::delete('/admin/pelatihan/delete-materi/{id}', [MaterialController::class, 'adminDeleteCreateMaterial']);

    
});

require __DIR__.'/auth.php';