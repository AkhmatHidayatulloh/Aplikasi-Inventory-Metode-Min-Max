<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\BarangController;
use App\Http\Controllers\Dashboard\CustomerController;
use App\Http\Controllers\Dashboard\SupplierController;
use App\Http\Controllers\Dashboard\PerhitunganController;
use App\Http\Controllers\dashboard\laporanTransaksiKeluar;
use App\Http\Controllers\Dashboard\NotificationController;
use App\Http\Controllers\Dashboard\VerifPermintaanKeluarController;

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
    return redirect('login');
});


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';

Route::group([
    'prefix' => 'admin',
    'namespace' => 'App\Http\Controllers\Dashboard',
    'middleware' => ['auth', 'CekRole:admin,super visor']
], function () {
    // Route
    Route::resource('dashboard', 'DashboardController');

    Route::resource('supplier', 'SupplierController');
    Route::post('admin/supplier/ubah', [SupplierController::class, 'ubah'])->name('supplier.ubah');

    Route::resource('customer', 'CustomerController');
    Route::post('admin/customer/ubah', [CustomerController::class, 'ubah'])->name('customer.ubah');

    Route::resource('barang', 'BarangController');
    Route::post('admin/barang/ubah', [BarangController::class, 'ubah'])->name('barang.ubah');

    Route::get('verif-permintaan-keluar', [VerifPermintaanKeluarController::class, 'index'])->name('verif.index');
    Route::post('verif-permintaan-keluar/verif', [VerifPermintaanKeluarController::class, 'verif'])->name('verif.update');
    Route::post('verif-permintaan-keluar/tolak', [VerifPermintaanKeluarController::class, 'tolak'])->name('verif.tolak');
    Route::get('perhitungan-min-max', [PerhitunganController::class, 'index'])->name('perhitungan.index');
    Route::post('perhitungan-min-max', [PerhitunganController::class, 'store'])->name(name: 'perhitungan.store');
    Route::get('/notif', [NotificationController::class, 'index'])->name('notif.index');
    Route::get('/notifications', [NotificationController::class, 'getNotifications'])->name('notif');
    Route::post('/notifications/read/{id}', [NotificationController::class, 'markAsRead'])->name('notif-baca');
    Route::get('/notifications/count', [NotificationController::class, 'count'])->name('notif-count');
    Route::get('/notifications-pending/count', [NotificationController::class, 'countPending'])->name('pending-count');
    Route::post('baca-notif', [NotificationController::class, 'markAsRead'])->name(name: 'baca.notif');
    Route::get('/laporan-keluar', [laporanTransaksiKeluar::class, 'index'])->name('index-laporan-keluar');
});

Route::group([
    'prefix' => 'admin',
    'namespace' => 'App\Http\Controllers\Dashboard',
    'middleware' => ['auth', 'CekRole:admin,super visor,gudang']
], function () {
    // Route
    Route::resource('dashboard', 'DashboardController');

    Route::resource('transaksi_masuk', 'TransaksiMasukController');
    Route::resource('transaksi_keluar', 'TransaksiKeluarController');
});




// Route::group([
//     'prefix' => 'admin',
//     'namespace' => 'App\Http\Controllers\Dashboard',
//     'middleware' => ['auth', 'CekRole:user']
// ], function () {
//     // Route

//     Route::get('dashboard', function () {
//         return view('dashboard.pages.dashboard2');
//     });

// });
