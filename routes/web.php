<?php

use App\Models\Deviasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IkpaController;
use App\Http\Controllers\SkpdController;
use App\Http\Controllers\TkskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KlienController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\MutasiController;
use App\Http\Controllers\PanganController;
use App\Http\Controllers\RevisiController;
use App\Http\Controllers\DeviasiController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\EvaluasiController;
use App\Http\Controllers\PenerimaController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\DistribusiController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\PenyerapanController;
use App\Http\Controllers\VerifikasiController;
use App\Http\Controllers\AdminRevisiController;
use App\Http\Controllers\AdminDeviasiController;
use App\Http\Controllers\PemeliharaanController;
use App\Http\Controllers\AdminPenyerapanController;

Route::get('/', [LoginController::class, 'welcome']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
// Route::get('/daftar', [DaftarController::class, 'index']);
// Route::post('/daftar', [DaftarController::class, 'store']);

Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'dashboard']);

    Route::get('/user/ajukan', [UserController::class, 'ajukan']);
    Route::get('/user/ajukan/add', [UserController::class, 'add_ajukan']);
    Route::post('/user/ajukan/add', [UserController::class, 'store_ajukan']);
    Route::get('/user/ajukan/edit/{id}', [UserController::class, 'edit_ajukan']);
    Route::post('/user/ajukan/edit/{id}', [UserController::class, 'update_ajukan']);
    Route::get('/user/ajukan/delete/{id}', [UserController::class, 'delete_ajukan']);

    Route::get('/user/pengaduan', [UserController::class, 'pengaduan']);
    Route::get('/user/pengaduan/add', [UserController::class, 'add_pengaduan']);
    Route::post('/user/pengaduan/add', [UserController::class, 'store_pengaduan']);
    Route::get('/user/pengaduan/edit/{id}', [UserController::class, 'edit_pengaduan']);
    Route::post('/user/pengaduan/edit/{id}', [UserController::class, 'update_pengaduan']);
    Route::get('/user/pengaduan/delete/{id}', [UserController::class, 'delete_pengaduan']);
});

Route::middleware(['auth', 'superadmin'])->group(function () {
    Route::get('/superadmin', [HomeController::class, 'superadmin']);
    Route::get('/superadmin/pengaduan', [PengaduanController::class, 'index']);
    Route::get('/superadmin/laporan', [LaporanController::class, 'index']);

    Route::get('/superadmin/laporan/bulan', [LaporanController::class, 'bulan']);

    Route::get('/superadmin/barang', [BarangController::class, 'index']);
    Route::get('/superadmin/barang/add', [BarangController::class, 'add']);
    Route::post('/superadmin/barang/add', [BarangController::class, 'store']);
    Route::get('/superadmin/barang/edit/{id}', [BarangController::class, 'edit']);
    Route::post('/superadmin/barang/edit/{id}', [BarangController::class, 'update']);
    Route::get('/superadmin/barang/delete/{id}', [BarangController::class, 'delete']);

    Route::get('/superadmin/ruangan', [RuanganController::class, 'index']);
    Route::get('/superadmin/ruangan/add', [RuanganController::class, 'add']);
    Route::post('/superadmin/ruangan/add', [RuanganController::class, 'store']);
    Route::get('/superadmin/ruangan/edit/{id}', [RuanganController::class, 'edit']);
    Route::post('/superadmin/ruangan/edit/{id}', [RuanganController::class, 'update']);
    Route::get('/superadmin/ruangan/delete/{id}', [RuanganController::class, 'delete']);

    Route::get('/superadmin/pegawai', [PegawaiController::class, 'index']);
    Route::get('/superadmin/pegawai/add', [PegawaiController::class, 'add']);
    Route::post('/superadmin/pegawai/add', [PegawaiController::class, 'store']);
    Route::get('/superadmin/pegawai/edit/{id}', [PegawaiController::class, 'edit']);
    Route::post('/superadmin/pegawai/edit/{id}', [PegawaiController::class, 'update']);
    Route::get('/superadmin/pegawai/delete/{id}', [PegawaiController::class, 'delete']);

    Route::get('/superadmin/inventaris', [InventarisController::class, 'index']);
    Route::get('/superadmin/inventaris/add', [InventarisController::class, 'add']);
    Route::post('/superadmin/inventaris/add', [InventarisController::class, 'store']);
    Route::get('/superadmin/inventaris/edit/{id}', [InventarisController::class, 'edit']);
    Route::post('/superadmin/inventaris/edit/{id}', [InventarisController::class, 'update']);
    Route::get('/superadmin/inventaris/delete/{id}', [InventarisController::class, 'delete']);

    Route::get('/superadmin/mutasi', [MutasiController::class, 'index']);
    Route::get('/superadmin/mutasi/add', [MutasiController::class, 'add']);
    Route::post('/superadmin/mutasi/add', [MutasiController::class, 'store']);
    Route::get('/superadmin/mutasi/edit/{id}', [MutasiController::class, 'edit']);
    Route::post('/superadmin/mutasi/edit/{id}', [MutasiController::class, 'update']);
    Route::get('/superadmin/mutasi/delete/{id}', [MutasiController::class, 'delete']);

    Route::get('/superadmin/pemeliharaan', [PemeliharaanController::class, 'index']);
    Route::get('/superadmin/pemeliharaan/add', [PemeliharaanController::class, 'add']);
    Route::post('/superadmin/pemeliharaan/add', [PemeliharaanController::class, 'store']);
    Route::get('/superadmin/pemeliharaan/edit/{id}', [PemeliharaanController::class, 'edit']);
    Route::post('/superadmin/pemeliharaan/edit/{id}', [PemeliharaanController::class, 'update']);
    Route::get('/superadmin/pemeliharaan/delete/{id}', [PemeliharaanController::class, 'delete']);

    Route::get('/laporan/pilih', [LaporanController::class, 'pilih']);
    Route::get('/laporan/klien/print', [LaporanController::class, 'pdfklien']);
    Route::get('/laporan/dokumen/print', [LaporanController::class, 'pdfdokumen']);
    Route::get('/laporan/evaluasi/print', [LaporanController::class, 'pdfevaluasi']);
    Route::get('/laporan/verifikasi/print', [LaporanController::class, 'pdfverifikasi']);
    Route::get('/laporan/dokumen', [LaporanController::class, 'dokumen']);
    Route::get('/laporan/verifikasi', [LaporanController::class, 'verifikasi']);
    Route::get('/laporan/evaluasi', [LaporanController::class, 'evaluasi']);
});
Route::get('/logout', function () {
    Auth::logout();
    Session::flash('success', 'Anda Telah Logout');
    return redirect('/');
});
