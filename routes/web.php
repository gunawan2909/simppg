<?php

use App\Charts\KompalinChart;
use App\Http\Controllers\AsetController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PemeliharaanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['guest'])->group(function () {

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'auth']);
    Route::get('/registrasi', [AuthController::class, 'registrasi'])->name('registrasi');
    Route::post('/registrasi', [AuthController::class, 'store']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/user/null', [UserController::class, 'nullRole'])->name('user.role.null');
    Route::middleware(['user'])->group(function () {
        Route::get('/', function () {
            if (Auth::user()->jabatan == "Karyawan") {
                return redirect(route('pemeliharaan.komplain.index'));
            } else {
                return  redirect(route('pemeliharaan.pelaporan.index'));
            }
        })->name('dashboard');

        //Komponen CRUD
        Route::get('/aset/komponen', [AsetController::class, 'indexKomponen'])->name('aset.komponen.index');
        Route::post('/aset/komponen', [AsetController::class, 'storeKomponen']);
        Route::get('/aset/komponen/edit/{id}', [AsetController::class, 'editKomponen'])->name('aset.komponen.edit');
        Route::post('/aset/komponen/edit/{id}', [AsetController::class, 'updateKomponen']);
        Route::post('/aset/komponen/delete/{id}', [AsetController::class, 'deleteKomponen'])->name('aset.komponen.delete');
        //alat
        Route::get('/aset/alat', [AsetController::class, 'indexAlat'])->name('aset.alat.index');
        Route::post('/aset/alat', [AsetController::class, 'storeAlat']);
        Route::get('/aset/alat/edit/{id}', [AsetController::class, 'editAlat'])->name('aset.alat.edit');
        Route::post('/aset/alat/edit/{id}', [AsetController::class, 'updateAlat']);
        Route::post('/aset/alat/delete/{id}', [AsetController::class, 'deleteAlat'])->name('aset.alat.delete');
        //Bahan
        Route::get('/aset/bahan', [AsetController::class, 'indexBahan'])->name('aset.bahan.index');
        Route::post('/aset/bahan', [AsetController::class, 'storeBahan']);
        Route::get('/aset/bahan/edit/{id}', [AsetController::class, 'editBahan'])->name('aset.bahan.edit');
        Route::post('/aset/bahan/edit/{id}', [AsetController::class, 'updateBahan']);
        Route::post('/aset/bahan/delete/{id}', [AsetController::class, 'deleteBahan'])->name('aset.bahan.delete');
        //User
        Route::get('/user/role', [UserController::class, 'indexRole'])->name('user.role.index');
        Route::get('/user/role/edit/{id}', [UserController::class, 'editRole'])->name('user.role.edit');
        Route::post('/user/role/edit/{id}', [UserController::class, 'updateRole']);

        //Kegiatan 
        Route::get('/pemeliharaan/kegiatan', [PemeliharaanController::class, 'indexKegiatan'])->name('pemeliharaan.kegiatan.index');
        Route::post('/pemeliharaan/kegiatan', [PemeliharaanController::class, 'storeKegiatan']);
        Route::post('/pemeliharaan/kegiatan/delete/{id}', [PemeliharaanController::class, 'deleteKegiatan'])->name('pemeliharaan.kegiatan.delete');

        //komplain
        Route::get('/pemeliharaan/komplain', [PemeliharaanController::class, 'indexKomplain'])->name('pemeliharaan.komplain.index');
        Route::get('/pemeliharaan/komplain/add', [PemeliharaanController::class, 'addKomplain'])->name('pemeliharaan.komplain.add');
        Route::post('/pemeliharaan/komplain/add', [PemeliharaanController::class, 'storeKomplain']);
        Route::get('/pemeliharaan/komplain/detail/{id}', [PemeliharaanController::class, 'viewKomplain'])->name('pemeliharaan.komplain.detail');
        Route::post('/pemeliharaan/komplain/detail/{id}', [PemeliharaanController::class, 'updateKomplain']);

        //Pemeliharaan 
        Route::get('/pemeliharaan/penanganan', [PemeliharaanController::class, 'indexPemeliharaan'])->name('pemeliharaan.penanganan.index');
        Route::get('/pemeliharaan/penanganan/detail/{id}', [PemeliharaanController::class, 'detailPemeliharaan'])->name('pemeliharaan.penanganan.detail');
        Route::post('/pemeliharaan/penanganan/detail/{id}', [PemeliharaanController::class, 'finishPemeliharaan']);
        Route::post('/pemeliharaan/penanganan/delete/{id}', [PemeliharaanController::class, 'deletePemeliharaan'])->name('pemeliharaan.penanganan.delete');
        Route::post('/pemeliharaan/penanganan/AddTool/{id}', [PemeliharaanController::class, 'addToolPemeliharaan'])->name('pemeliharaan.penanganan.tool.add');
        Route::post('/pemeliharaan/penanganan/deleteTool/{id}', [PemeliharaanController::class, 'deleteToolPemeliharaan'])->name('pemeliharaan.penanganan.delete.tool');

        //Pelaporan 
        Route::get('/pemeliharaan/pelaporan', [PemeliharaanController::class, 'indexPelaporan'])->name('pemeliharaan.pelaporan.index');
        Route::get('/pemeliharaan/pelaporan/detail/{id}', [PemeliharaanController::class, 'detailPelaporan'])->name('pemeliharaan.pelaporan.detail');
        Route::get('/pemeliharaan/pelaporan/detailPdf/{id}', [PemeliharaanController::class, 'detailPelaporanPdf'])->name('pemeliharaan.pelaporan.print');
    });
});
