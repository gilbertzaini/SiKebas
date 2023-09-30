<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\PelapakController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\SampahController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

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

    Route::get('/admin/nasabah', [NasabahController::class, 'showAll'])->name('admin.daftarNasabah');
    Route::get('/admin/nasabah/{id}/detail', [NasabahController::class, 'show'])->name('admin.detailNasabah');
    Route::get('/admin/nasabah/new', [NasabahController::class, 'create'])->name('admin.nasabahBaru');
    Route::post('/admin/nasabah', [NasabahController::class, 'store'])->name('admin.storeNasabah');
    Route::get('/admin/nasabah/{id}/edit', [NasabahController::class, 'edit'])->name('admin.editNasabah');
    Route::patch('/admin/nasabah', [NasabahController::class, 'patch'])->name('admin.patchNasabah');
    Route::delete('/admin/nasabah/{id}', [NasabahController::class, 'delete'])->name('admin.deleteNasabah');
    // Route::post('/admin/nasabah/search', [NasabahController::class, 'search'])->name('admin.searchNasabah');
    // Route::get('/admin/nasabah/search/{param}', [NasabahController::class, 'filtered'])->name('admin.filteredNasabah');
    // Route::get('/admin/nasabah/export', [NasabahController::class, 'export'])->name('admin.exportNasabah');

    Route::get('/admin/pengurus', [PengurusController::class, 'showAll'])->name('admin.daftarPengurus');
    Route::get('/admin/pengurus/{id}/edit', [PengurusController::class, 'edit'])->name('admin.editPengurus');
    Route::patch('/admin/pengurus', [PengurusController::class, 'patch'])->name('admin.patchPengurus');
    Route::get('/admin/pengurus/{id}/detail', [PengurusController::class, 'show'])->name('admin.detailPengurus');
    // Route::post('/admin/pengurus/search', [PengurusController::class, 'search'])->name('admin.searchPengurus');
    // Route::get('/admin/pengurus/search/{param}', [PengurusController::class, 'filtered'])->name('admin.filteredPengurus');
    // Route::get('/admin/pengurus/export', [PengurusController::class, 'export'])->name('admin.exportPengurus');
    
    Route::get('/admin/sampah', [SampahController::class, 'showAll'])->name('admin.kategoriSampah');
    Route::get('/admin/sampah/create', [SampahController::class, 'create'])->name('admin.sampahBaru');
    Route::post('/admin/sampah', [SampahController::class, 'store'])->name('admin.storeSampah');
    Route::get('/admin/sampah/{id}/edit', [SampahController::class, 'edit'])->name('admin.editSampah');
    Route::patch('/admin/sampah', [SampahController::class, 'patch'])->name('admin.patchSampah');
    Route::delete('/admin/sampah/{id}', [SampahController::class, 'delete'])->name('admin.deleteSampah');
    // Route::post('/admin/sampah/search', [SampahController::class, 'search'])->name('admin.searchSampah');
    // Route::get('/admin/sampah/search/{param}', [SampahController::class, 'filtered'])->name('admin.filteredSampah');
    // Route::get('/admin/sampah/{id}/detail', [SampahController::class, 'show'])->name('admin.detailSampah');
    // Route::get('/admin/sampah/export', [SampahController::class, 'export'])->name('admin.exportSampah');

    Route::get('/admin/sampah/data', [SampahController::class, 'showData'])->name('admin.dataSampah');
    Route::get('/admin/sampah/data/tambah', [SampahController::class, 'createDataSampah'])->name('admin.dataSampahBaru');
    Route::post('/admin/sampah/data/store', [SampahController::class, 'storeDataSampah'])->name('admin.storeDataSampahBaru');
    Route::get('/admin/sampah/data/{kodeSampah}/edit', [SampahController::class, 'editDataSampah'])->name('admin.editDataSampah');
    Route::patch('/admin/sampah/data', [SampahController::class, 'patchDataSampah'])->name('admin.patchDataSampah');
    Route::delete('/admin/sampah/data/{kodeSampah}/delete', [SampahController::class, 'deleteDataSampah'])->name('admin.deleteDataSampah');

    Route::get('/admin/pelapak', [PelapakController::class, 'showAll'])->name('admin.daftarPelapak');
    Route::get('/admin/pelapak/create', [PelapakController::class, 'create'])->name('admin.pelapakBaru');
    Route::post('/admin/pelapak', [PelapakController::class, 'store'])->name('admin.storePelapak');
    Route::get('/admin/pelapak/{id}/edit', [PelapakController::class, 'edit'])->name('admin.editPelapak');
    Route::patch('/admin/pelapak', [PelapakController::class, 'patch'])->name('admin.patchPelapak');
    Route::delete('/admin/pelapak/{id}', [PelapakController::class, 'delete'])->name('admin.deletePelapak');

    Route::get('/admin/transaksi/setoran-nasabah', [TransaksiController::class, 'setoranNasabah'])->name('admin.setoranNasabah');
    Route::post('/admin/transaksi/setoran-nasabah', [TransaksiController::class, 'setoranNasabahById'])->name('admin.setoranNasabahId');
    Route::get('/admin/transaksi/setoran-nasabah/{id}/tambah', [TransaksiController::class, 'setoranNasabahBaru'])->name('admin.setoranNasabahBaru');
    Route::post('/admin/transaksi/setoran-nasabah/tambah', [TransaksiController::class, 'storeSetoranNasabahBaru'])->name('admin.storeSetoranNasabahBaru');

    Route::get('/admin/transaksi/tabungan-nasabah', [TransaksiController::class, 'tabunganNasabah'])->name('admin.tabunganNasabah');
    Route::get('/admin/transaksi/penarikan', [TransaksiController::class, 'penarikanNasabah'])->name('admin.penarikanNasabah');
    Route::post('/admin/transaksi/penarikan', [TransaksiController::class, 'storePenarikanNasabah'])->name('admin.storePenarikanNasabah');

    Route::get('/admin/transaksi/penjualan-nasabah', [TransaksiController::class, 'transaksiPenjualanNasabah'])->name('admin.transaksiPenjualanNasabah');
    Route::get('/admin/transaksi/penjualan-nasabah/tambah', [TransaksiController::class, 'tambahPenjualanSampah'])->name('admin.tambahPenjualanSampah');
    Route::post('/admin/transaksi/penjualan-nasabah/tambah', [TransaksiController::class, 'storePenjualanSampah'])->name('admin.storePenjualanSampah');
});

Route::middleware(['auth', 'superuser'])->group(function () {
    Route::get('/admin/pengurus/new', [PengurusController::class, 'create'])->name('admin.pengurusBaru');
    Route::post('/admin/pengurus', [PengurusController::class, 'store'])->name('admin.storePengurus');
    Route::delete('/admin/pengurus/{id}', [PengurusController::class, 'delete'])->name('admin.deletePengurus');

    Route::get('/admin/laporan/arus-kas-nasabah', [LaporanController::class, 'kasNasabah'])->name('admin.laporanArusKasNasabah');
    Route::post('/admin/laporan/arus-kas-nasabah', [LaporanController::class, 'kasNasabahByDate'])->name('admin.laporanArusKasNasabahByDate');
    Route::get('/admin/laporan/arus-kas-nasabah/export/{tanggalMulai}/{tanggalSelesai}', [LaporanController::class, 'kasNasabahExport'])->name('admin.exportKasNasabah');

    Route::get('/admin/laporan/nasabah', [LaporanController::class, 'nasabah'])->name('admin.laporanNasabah');
    Route::post('/admin/laporan/nasabah', [LaporanController::class, 'nasabahByDate'])->name('admin.laporanNasabahByDate');
    Route::get('/admin/laporan/nasabah/export/{tanggalMulai}/{tanggalSelesai}', [LaporanController::class, 'nasabahExport'])->name('admin.exportLaporanNasabah');

    Route::get('/admin/laporan/pembayaran-ke-lapak', [LaporanController::class, 'pembayaranLapak'])->name('admin.laporanPembayaranKeLapak');
    Route::post('/admin/laporan/pembayaran-ke-lapak', [LaporanController::class, 'pembayaranLapakByDate'])->name('admin.laporanPembayaranKeLapakByDate');
    Route::get('/admin/laporan/pembayaran-ke-lapak/export/{tanggalMulai}/{tanggalSelesai}', [LaporanController::class, 'pembayaranLapakExport'])->name('admin.exportPembayaranLapak');

    Route::get('/admin/laporan/DLHK', [LaporanController::class, 'dlhk'])->name('admin.laporanDLHK');
    Route::post('/admin/laporan/DLHK', [LaporanController::class, 'dlhkByDate'])->name('admin.laporanDLHKbyDate');
    Route::get('/admin/laporan/DLHK/export/{tanggalMulai}/{tanggalSelesai}', [LaporanController::class, 'dlhkExport'])->name('admin.exportLaporanDLHK');

    Route::get('/admin/laporan/internal', [LaporanController::class, 'internal'])->name('admin.laporanInternal');
    Route::post('/admin/laporan/internal', [LaporanController::class, 'internalByDate'])->name('admin.laporanInternalByDate');
    Route::get('/admin/laporan/internal/export/{tanggalMulai}/{tanggalSelesai}', [LaporanController::class, 'internalExport'])->name('admin.exportLaporanInternal');
});
