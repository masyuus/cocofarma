<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
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

// Admin routes
Route::get('/mimin', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/mimin', [AdminController::class, 'login']);
Route::post('/backoffice/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::middleware('auth')->group(function () {
    Route::get('/backoffice/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    // Placeholder admin resource routes for sidebar links (create real controllers later)
    Route::get('/backoffice/orders', function(){ return view('admin.placeholder', ['title' => 'Pesanan']); })->name('admin.orders.index');
    Route::get('/backoffice/rawmaterials', function(){ return view('admin.placeholder', ['title' => 'Bahan Baku']); })->name('admin.rawmaterials.index');
    Route::get('/backoffice/production', function(){ return view('admin.placeholder', ['title' => 'Produksi']); })->name('admin.production.index');
    Route::get('/backoffice/sales', function(){ return view('admin.placeholder', ['title' => 'Penjualan / Transaksi']); })->name('admin.sales.index');
    Route::get('/backoffice/reports', function(){ return view('admin.placeholder', ['title' => 'Laporan']); })->name('admin.reports.index');
    Route::get('/backoffice/products', function(){ return view('admin.placeholder', ['title' => 'Produk']); })->name('admin.products.index');
    Route::get('/backoffice/users', function(){ return view('admin.placeholder', ['title' => 'User & Hak Akses']); })->name('admin.users.index');
    Route::get('/backoffice/settings', function(){ return view('admin.placeholder', ['title' => 'Pengaturan Sistem']); })->name('admin.settings.index');
});

require __DIR__.'/auth.php';
