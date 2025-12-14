<?php

use App\Http\Controllers\site\SiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\JenisHewanController;
use App\Http\Controllers\admin\PemilikController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\RasHewanController;
use App\Http\Controllers\admin\KategoriController;
use App\Http\Controllers\admin\KategoriKlinisController;
use App\Http\Controllers\admin\KodeTindakanController;
use App\Http\Controllers\admin\PetController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\DashboardAdminController;

use App\Http\Controllers\dokter\DokterDashboardController;
use App\Http\Controllers\Dokter\RekamMedisController as DokterRekamMedisController;

use App\Http\Controllers\perawat\PerawatDashboardController;
use App\Http\Controllers\Perawat\RekamMedisController;

use App\Http\Controllers\resepsionis\ResepsionisDashboardController;
use App\Http\Controllers\pemilik\PemilikDashboardController;


route::get('/koneksi', [SiteController::class, 'koneksi'])->name('site.koneksi');

route::get('/', [SiteController::class, 'index'])->name('site.home');
route::get('/layanan', [SiteController::class, 'layanan'])->name('site.layanan');
route::get('/visi', [SiteController::class, 'visi'])->name('site.visi');
route::get('/struktur', [SiteController::class, 'struktur'])->name('site.struktur');

Auth::routes();

// Admin
route::prefix('admin')->middleware('IsAdministrator')->group(function() {
    route::get('/dashboard-admin', [DashboardAdminController::class, 'index'])->name('admin.dashboard-admin');
    route::get('/jenis-hewan', [JenisHewanController::class, 'index'])->name('admin.jenis-hewan.index');
    route::get('/jenis-hewan/create', [JenisHewanController::class, 'create'])->name('admin.jenis-hewan.create');
    route::post('/jenis-hewan', [JenisHewanController::class, 'store'])->name('admin.jenis-hewan.store');
    route::get('/jenis-hewan/{id}/edit', [JenisHewanController::class, 'edit'])->name('admin.jenis-hewan.edit');
    route::put('/jenis-hewan/{id}', [JenisHewanController::class, 'update'])->name('admin.jenis-hewan.update');
    route::delete('/jenis-hewan/{id}', [JenisHewanController::class, 'destroy'])->name('admin.jenis-hewan.destroy');
    route::post('/jenis-hewan/{id}/restore', [JenisHewanController::class, 'restore'])->name('admin.jenis-hewan.restore');
    route::delete('/jenis-hewan/{id}/force-delete', [JenisHewanController::class, 'forceDelete'])->name('admin.jenis-hewan.forceDelete');

    route::get('/pemilik', [PemilikController::class, 'index'])->name('admin.pemilik.index');
    // route::get('/pemilik/create', [PemilikController::class, 'create'])->name('admin.pemilik.create');
    // route::post('/pemilik', [PemilikController::class, 'store'])->name('admin.pemilik.store');

    route::get('/users', [UserController::class, 'index'])->name('admin.user.index');
    route::get('/users/create', [UserController::class, 'create'])->name('admin.user.create');
    route::post('/users', [UserController::class, 'store'])->name('admin.user.store');
    route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('admin.user.edit');
    route::put('/users/{id}', [UserController::class, 'update'])->name('admin.user.update');
    route::post('/users/{id}/reset-password', [UserController::class, 'resetPassword'])->name('admin.user.reset');

    route::get('/ras-hewan', [RasHewanController::class, 'index'])->name('admin.ras-hewan.index');
    route::get('/ras-hewan/create', [RasHewanController::class, 'create'])->name('admin.ras-hewan.create');
    route::post('/ras-hewan', [RasHewanController::class, 'store'])->name('admin.ras-hewan.store');
    route::get('/ras-hewan/{id}/edit', [RasHewanController::class, 'edit'])->name('admin.ras-hewan.edit');
    route::put('/ras-hewan/{id}', [RasHewanController::class, 'update'])->name('admin.ras-hewan.update');
    route::delete('/ras-hewan/{id}', [RasHewanController::class, 'destroy'])->name('admin.ras-hewan.destroy');
    route::post('/ras-hewan/{id}/restore', [RasHewanController::class, 'restore'])->name('admin.ras-hewan.restore');
    route::delete('/ras-hewan/{id}/force-delete', [RasHewanController::class, 'forceDelete'])->name('admin.ras-hewan.forceDelete');

    route::get('/kategori', [KategoriController::class, 'index'])->name('admin.kategori.index');
    route::get('/kategori/create', [KategoriController::class, 'create'])->name('admin.kategori.create');
    route::post('/kategori', [KategoriController::class, 'store'])->name('admin.kategori.store');
    route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('admin.kategori.edit');
    route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('admin.kategori.update');

    route::get('/kategori-klinis', [KategoriKlinisController::class, 'index'])->name('admin.kategori-klinis.index');
    route::get('/kategori-klinis/create', [KategoriKlinisController::class, 'create'])->name('admin.kategori-klinis.create');
    route::post('/kategori-klinis', [KategoriKlinisController::class, 'store'])->name('admin.kategori-klinis.store');

    route::get('/kode-tindakan-terapi', [KodeTindakanController::class, 'index'])->name('admin.kode-tindakan-terapi.index');
    route::get('/kode-tindakan-terapi/create', [KodeTindakanController::class, 'create'])->name('admin.kode-tindakan-terapi.create');
    route::post('/kode-tindakan-terapi', [KodeTindakanController::class, 'store'])->name('admin.kode-tindakan-terapi.store');

    route::get('/pet', [PetController::class, 'index'])->name('admin.pet.index');
    // route::get('/pet/create', [PetController::class, 'create'])->name('admin.pet.create');
    // route::post('/pet', [PetController::class, 'store'])->name('admin.pet.store');
    
    route::get('/role', [RoleController::class, 'index'])->name('admin.role.index');
    route::get('/role/create', [RoleController::class, 'create'])->name('admin.role.create');
    route::post('/role', [RoleController::class, 'store'])->name('admin.role.store');
  
    route::get('/role-user', [App\Http\Controllers\admin\RoleUserController::class, 'index'])->name('admin.role-user.index');
    route::post('/role-user', [App\Http\Controllers\admin\RoleUserController::class, 'store'])->name('admin.role-user.store');
    route::delete('/role-user/{id}', [App\Http\Controllers\admin\RoleUserController::class, 'destroy'])->name('admin.role-user.destroy');
    // Create dokter / perawat pages (admin)
    route::get('/dokter/create', [App\Http\Controllers\admin\StaffController::class, 'createDokter'])->name('admin.dokter.create');
    route::post('/dokter', [App\Http\Controllers\admin\StaffController::class, 'storeDokter'])->name('admin.dokter.store');

    route::get('/perawat/create', [App\Http\Controllers\admin\StaffController::class, 'createPerawat'])->name('admin.perawat.create');
    route::post('/perawat', [App\Http\Controllers\admin\StaffController::class, 'storePerawat'])->name('admin.perawat.store');
});

// Dokter
route::prefix('dokter')->middleware('IsDokter')->group(function() {
    route::get('/dashboard-dokter', [DokterDashboardController::class, 'index'])->name('dokter.dashboard-dokter');
    // Rekam medis (Dokter) - index
    route::get('/rekam-medis', [DokterRekamMedisController::class, 'index'])->name('dokter.rekam-medis.index');
    route::get('/rekam-medis/{id}', [DokterRekamMedisController::class, 'show'])->name('dokter.rekam-medis.show');
    // allow dokter to add detail lines when viewing a rekam medis
    route::post('/rekam-medis/{id}/detail', [DokterRekamMedisController::class, 'storeDetail'])->name('dokter.rekam-medis.detail.store');
});

// Perawat
route::prefix('perawat')->middleware('IsPerawat')->group(function() {
    route::get('/dashboard-perawat', [PerawatDashboardController::class, 'index'])->name('perawat.dashboard-perawat');
    // Rekam medis (Perawat)
    route::get('/rekam-medis', [RekamMedisController::class, 'index'])->name('perawat.rekam-medis.index');
    route::get('/rekam-medis/create', [RekamMedisController::class, 'create'])->name('perawat.rekam-medis.create');
    route::post('/rekam-medis', [RekamMedisController::class, 'store'])->name('perawat.rekam-medis.store');
    route::get('/rekam-medis/{id}', [RekamMedisController::class, 'show'])->name('perawat.rekam-medis.show');
    route::post('/rekam-medis/{id}/detail', [RekamMedisController::class, 'storeDetail'])->name('perawat.rekam-medis.detail.store');
});

// Resepsionis
route::prefix('resepsionis')->middleware('IsResepsionis')->group(function() {
    route::get('/dashboard-resepsionis', [ResepsionisDashboardController::class, 'index'])->name('resepsionis.dashboard-resepsionis');
    
    // Registrasi pemilik (resepsionis)
    route::get('/pemilik/register', [App\Http\Controllers\Resepsionis\PemilikRegistrationController::class, 'create'])->name('resepsionis.pemilik.register');
    route::post('/pemilik/register', [App\Http\Controllers\Resepsionis\PemilikRegistrationController::class, 'store'])->name('resepsionis.pemilik.store');
    
    // Registrasi pet
    route::get('/pet/register', [App\Http\Controllers\Resepsionis\PetRegistrationController::class, 'create'])->name('resepsionis.pet.register');
    route::post('/pet/register', [App\Http\Controllers\Resepsionis\PetRegistrationController::class, 'store'])->name('resepsionis.pet.store');
    
    // Temu dokter
    route::get('/temu/create', [App\Http\Controllers\Resepsionis\TemuDokterController::class, 'create'])->name('resepsionis.temu.create');
    route::post('/temu', [App\Http\Controllers\Resepsionis\TemuDokterController::class, 'store'])->name('resepsionis.temu.store');
    route::get('/temu', [App\Http\Controllers\Resepsionis\TemuDokterController::class, 'index'])->name('resepsionis.temu.index');
});

// Pemilik
route::prefix('pemilik')->middleware('IsPemilik')->group(function() {
    route::get('/dashboard-pemilik', [PemilikDashboardController::class, 'index'])->name('pemilik.dashboard-pemilik');
    // Pemilik-specific indexes
    route::get('/pets', [App\Http\Controllers\Pemilik\PemilikController::class, 'pets'])->name('pemilik.pets.index');
    route::get('/rekam-medis', [App\Http\Controllers\Pemilik\PemilikController::class, 'rekamMedis'])->name('pemilik.rekam-medis.index');
    route::get('/rekam-medis/{id}', [App\Http\Controllers\Pemilik\PemilikController::class, 'show'])->name('pemilik.rekam-medis.show');
    route::get('/reservations', [App\Http\Controllers\Pemilik\PemilikController::class, 'reservations'])->name('pemilik.reservations.index');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
