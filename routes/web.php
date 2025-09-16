<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\BahanBakuController;
use App\Http\Controllers\Admin\PesananController;
use App\Http\Controllers\Admin\ProduksiController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PengaturanController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Backoffice authentication routes
Route::get('/mimin', [AdminController::class, 'showLogin'])->name('backoffice.login');
Route::post('/mimin', [AdminController::class, 'login']);
Route::post('/backoffice/logout', [AdminController::class, 'logout'])->name('backoffice.logout');

// Backoffice routes with role-based access
Route::middleware(['auth'])->prefix('backoffice')->name('backoffice.')->group(function () {
    
    // Dashboard (accessible by both super_admin and admin)
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Operasional routes (accessible by both super_admin and admin)
    Route::middleware('role:super_admin,admin')->group(function () {
        Route::prefix('pesanan')->name('pesanan.')->group(function () {
            Route::resource('/', PesananController::class)->parameters(['' => 'pesanan']);
        });

        Route::prefix('bahanbaku')->name('bahanbaku.')->group(function () {
            Route::resource('/', BahanBakuController::class)->parameters(['' => 'bahanbaku']);
        });

        Route::prefix('produksi')->name('produksi.')->group(function () {
            Route::resource('/', ProduksiController::class)->parameters(['' => 'produksi']);
        });

        Route::prefix('transaksi')->name('transaksi.')->group(function () {
            Route::resource('/', TransaksiController::class)->parameters(['' => 'transaksi']);
        });

        Route::prefix('laporan')->name('laporan.')->group(function () {
            Route::get('/', [LaporanController::class, 'index'])->name('index');
            Route::get('/produksi', [LaporanController::class, 'produksi'])->name('produksi');
            Route::get('/stok', [LaporanController::class, 'stok'])->name('stok');
            Route::get('/penjualan', [LaporanController::class, 'penjualan'])->name('penjualan');
            Route::get('/export-pdf/{type}', [LaporanController::class, 'exportPdf'])->name('export-pdf');
            Route::get('/export-excel/{type}', [LaporanController::class, 'exportExcel'])->name('export-excel');
        });
    });

    // Master routes (only accessible by super_admin)
    Route::middleware('role:super_admin')->group(function () {
        Route::prefix('master-produk')->name('master-produk.')->group(function () {
            Route::resource('/', ProdukController::class)->parameters(['' => 'produk']);
        });

        Route::prefix('master-bahan')->name('master-bahan.')->group(function () {
            Route::resource('/', BahanBakuController::class)->parameters(['' => 'bahanbaku']);
        });

        Route::prefix('master-user')->name('master-user.')->group(function () {
            Route::resource('/', UserController::class)->parameters(['' => 'user']);
        });

        Route::prefix('pengaturan')->name('pengaturan.')->group(function () {
            Route::resource('/', PengaturanController::class)->parameters(['' => 'pengaturan']);
        });
    });
});

require __DIR__.'/auth.php';
