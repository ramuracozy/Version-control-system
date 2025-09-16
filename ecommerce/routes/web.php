<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/dashboard/add-product', [AdminController::class, 'addProduct'])->name('admin.dashboard.add-product');
    Route::get('/admin/dashboard/edit-product/{id}', [AdminController::class, 'editProduct'])->name('admin.dashboard.edit-product');
    Route::get('/admin/data-master', [AdminController::class, 'dataMaster'])->name('admin.data-master');
    Route::get('/admin/data-master/add-jenis-product', [AdminController::class, 'addJenisProduct'])->name('admin.data-master.add-jenis-product');
    Route::get('/admin/data-master/edit-jenis-product/{id}', [AdminController::class, 'editJenisProduct'])->name('admin.data-master.edit-jenis-product');
    Route::get('/admin/data-master/add-kategori-tokoh', [AdminController::class, 'addKategoriTokoh'])->name('admin.data-master.add-kategori-tokoh');
    Route::get('/admin/data-master/edit-kategori-tokoh/{id}', [AdminController::class, 'editKategoriTokoh'])->name('admin.data-master.edit-kategori-tokoh');
    
    Route::post('/admin/data-master/add-jenis-product', [AdminController::class, 'storeJenisProduct'])->name('admin.data-master.store-jenis-product');
    Route::post('/admin/data-master/edit-jenis-product/{id}', [AdminController::class, 'updateJenisProduct'])->name('admin.data-master.update-jenis-product');
    Route::post('/admin/data-master/delete-jenis-product', [AdminController::class, 'deleteJenisProduct'])->name('admin.data-master.delete-jenis-product');
    Route::post('/admin/data-master/add-kategori-tokoh', [AdminController::class, 'storeKategoriTokoh'])->name('admin.data-master.store-kategori-tokoh');
    Route::post('/admin/data-master/edit-kategori-tokoh/{id}', [AdminController::class, 'updateKategoriTokoh'])->name('admin.data-master.update-kategori-tokoh');
    Route::post('/admin/data-master/delete-kategori-tokoh', [AdminController::class, 'deleteKategoriTokoh'])->name('admin.data-master.delete-kategori-tokoh');
    Route::post('/admin/dashboard/add-product', [AdminController::class, 'storeProduct'])->name('admin.dashboard.store-product');
    Route::post('/admin/dashboard/edit-product/{id}', [AdminController::class, 'updateProduct'])->name('admin.dashboard.update-product');
    Route::post('/admin/dashboard/delete-product', [AdminController::class, 'deleteProduct'])->name('admin.dashboard.delete-product');
    // Add other admin routes here
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard/product-detail/{id}', [DashboardController::class, 'productDetail'])->name('dashboard.product-detail');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/dashboard/add-testimoni', [DashboardController::class, 'storeTestimoni'])->name('dashboard.add-testimoni');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
