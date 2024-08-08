<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\BarangController;
use App\Http\Controllers\Dashboard\CustomerController;
use App\Http\Controllers\Dashboard\SupplierController;

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

require __DIR__.'/auth.php';

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