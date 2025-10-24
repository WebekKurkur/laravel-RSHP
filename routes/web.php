<?php

use App\Http\Controllers\admin\KategoriController;
use App\Http\Controllers\admin\KategoriKlinisController;
use App\Http\Controllers\admin\KodeTindakanTerapiController;
use App\Http\Controllers\admin\PetController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\RoleUserController;
use App\Http\Controllers\admin\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\admin\JenisHewanController;
use App\Http\Controllers\admin\RasHewanController;



Route::get('/', [SiteController::class, 'homeindex'])->name('site.home');
Route::get('/layanan', [SiteController::class, 'layananindex'])->name('site.layanan');
Route::get('/struktur', [SiteController::class, 'strukturindex'])->name('site.struktur');
Route::get('/visimisi', [SiteController::class, 'VMindex'])->name('site.visiMisi');

//halaman admin
Route::get('admin/jenis-hewan', [JenisHewanController::class, 'index']);
Route::get('admin/ras-hewan', [RasHewanController::class, 'index']);
Route::get('admin/kategori', [KategoriController::class, 'index']);
Route::get('admin/kategori-klinis', [KategoriKlinisController::class, 'index']);
Route::get('admin/kode-tindakan-terapi', [KodeTindakanTerapiController::class, 'index']);
Route::get('admin/pet', [PetController::class, 'index']); //ini belom bisa masih belom ada relasi
                                                                       //ke user dan pemilik
Route::get('admin/role', [RoleController::class, 'index']);
Route::get('admin/user', [UserController::class, 'index']);
Route::get('admin/role-user', [RoleUserController::class, 'index']);



route::get( '/cek-koneksi', function () {
    try{
        DB::connection()->getPdo();
        return "koneksi ke database berhasil: " . DB::connection()->getDatabaseName();
    } catch(\Exception $e) {
        return "gagal koneksi: " . $e->getMessage();
    }
});

