<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\SampahController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin', [HomeController::class, 'index'])->name('admin.index');
    Route::get('/admin/dashboard', [HomeController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/transaksi', [HomeController::class, 'transactions'])->name('admin.daftarTransaksi');
    
    // Route::get('/admin', function () {
    //     return redirect()->route('admin.dashboard');
    // });

    Route::get('/admin/nasabah', [NasabahController::class, 'showAll'])->name('admin.daftarNasabah');
    Route::post('/admin/nasabah/search', [NasabahController::class, 'search'])->name('admin.searchNasabah');
    Route::get('/admin/nasabah/search/{param}', [NasabahController::class, 'filtered'])->name('admin.filteredNasabah');
    Route::get('/admin/nasabah/{id}/detail', [NasabahController::class, 'show'])->name('admin.detailNasabah');
    Route::get('/admin/nasabah/new', [NasabahController::class, 'create'])->name('admin.nasabahBaru');
    Route::post('/admin/nasabah/store', [NasabahController::class, 'store'])->name('admin.storeNasabah');
    Route::get('/admin/nasabah/{id}/edit', [NasabahController::class, 'edit'])->name('admin.editNasabah');
    Route::patch('/admin/nasabah/patch', [NasabahController::class, 'patch'])->name('admin.patchNasabah');
    Route::delete('/admin/nasabah/{id}/delete', [NasabahController::class, 'delete'])->name('admin.deleteNasabah');
    Route::get('/admin/nasabah/export', [NasabahController::class, 'export'])->name('admin.exportNasabah');

    Route::get('/admin/pengurus', [PengurusController::class, 'showAll'])->name('admin.daftarPengurus');
    Route::post('/admin/pengurus/search', [PengurusController::class, 'search'])->name('admin.searchPengurus');
    Route::get('/admin/pengurus/search/{param}', [PengurusController::class, 'filtered'])->name('admin.filteredPengurus');
    Route::get('/admin/pengurus/{id}/detail', [PengurusController::class, 'show'])->name('admin.detailPengurus');
    Route::get('/admin/pengurus/new', [PengurusController::class, 'create'])->name('admin.pengurusBaru');
    Route::post('/admin/pengurus/store', [PengurusController::class, 'store'])->name('admin.storePengurus');
    Route::get('/admin/pengurus/{id}/edit', [PengurusController::class, 'edit'])->name('admin.editPengurus');
    Route::patch('/admin/pengurus/patch', [PengurusController::class, 'patch'])->name('admin.patchPengurus');
    Route::delete('/admin/pengurus/{id}/delete', [PengurusController::class, 'delete'])->name('admin.deletePengurus');
    Route::get('/admin/pengurus/export', [PengurusController::class, 'export'])->name('admin.exportPengurus');

    Route::get('/admin/sampah', [SampahController::class, 'showAll'])->name('admin.kategoriSampah');
    Route::post('/admin/sampah/search', [SampahController::class, 'search'])->name('admin.searchSampah');
    Route::get('/admin/sampah/search/{param}', [SampahController::class, 'filtered'])->name('admin.filteredSampah');
    // Route::get('/admin/sampah/{id}/detail', [SampahController::class, 'show'])->name('admin.detailSampah');
    Route::get('/admin/sampah/create', [SampahController::class, 'create'])->name('admin.sampahBaru');
    Route::post('/admin/sampah/store', [SampahController::class, 'store'])->name('admin.storeSampah');
    Route::get('/admin/sampah/{id}/edit', [SampahController::class, 'edit'])->name('admin.editSampah');
    Route::patch('/admin/sampah/patch', [SampahController::class, 'patch'])->name('admin.patchSampah');
    Route::delete('/admin/sampah/{id}/delete', [SampahController::class, 'delete'])->name('admin.deleteSampah');
    Route::get('/admin/sampah/export', [SampahController::class, 'export'])->name('admin.exportSampah');

    Route::get('/admin/detailBaruPenjualan', function () {
        return view('admin.detailBaruPenjualan');
    })->name('admin.detailBaruPenjualan');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
