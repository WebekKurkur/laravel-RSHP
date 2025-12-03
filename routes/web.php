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
use App\Http\Controllers\DokterDashboardController;
use App\Http\Controllers\PerawatDashboardController;
use App\Http\Controllers\ResepsionisDashboardController;
use App\Http\Controllers\PemilikDashboardController;


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
    route::get('/pemilik', [PemilikController::class, 'index'])->name('admin.pemilik.index');
    route::get('/users', [UserController::class, 'index'])->name('admin.user.index');
    route::get('/ras-hewan', [RasHewanController::class, 'index'])->name('admin.ras-hewan.index');
    route::get('/kategori', [KategoriController::class, 'index'])->name('admin.kategori.index');
    route::get('/kategori-klinis', [KategoriKlinisController::class, 'index'])->name('admin.kategori-klinis.index');
    route::get('/kode-tindakan-terapi', [KodeTindakanController::class, 'index'])->name('admin.kode-tindakan-terapi.index');
    route::get('/pet', [PetController::class, 'index'])->name('admin.pet.index');
    route::get('/role', [RoleController::class, 'index'])->name('admin.role.index');
});

// Dokter
route::prefix('dokter')->middleware('IsDokter')->group(function() {
    route::get('/dashboard-dokter', [DokterDashboardController::class, 'index'])->name('dokter.dashboard-dokter');
});

// Perawat
route::prefix('perawat')->middleware('IsPerawat')->group(function() {
    route::get('/dashboard-perawat', [PerawatDashboardController::class, 'index'])->name('perawat.dashboard-perawat');
});

// Resepsionis
route::prefix('resepsionis')->middleware('IsResepsionis')->group(function() {
    route::get('/dashboard-resepsionis', [ResepsionisDashboardController::class, 'index'])->name('resepsionis.dashboard-resepsionis');
});

// Pemilik
route::prefix('pemilik')->middleware('IsPemilik')->group(function() {
    route::get('/dashboard-pemilik', [PemilikDashboardController::class, 'index'])->name('pemilik.dashboard-pemilik');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
