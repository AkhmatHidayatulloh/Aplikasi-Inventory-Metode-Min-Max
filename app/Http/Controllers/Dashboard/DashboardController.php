<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Barang;
use App\Models\Customer;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\TransaksiBarangMasuk;

class DashboardController extends Controller
{
    public function index()
    {

        $title = 'Dashboard';

        $supplier = Supplier::count('id');

        $customer = Customer::count('id');

        $namabarang = Barang::all();

        $transaksi_masuk = DB::table('transaksi_barang_masuk as a')
        ->join('barang as b', 'a.id_barang', '=', 'b.id')
        ->select(
            'b.nama_barang',
            DB::raw('SUM(a.jumlah_barang_masuk) as jumlah'),
            DB::raw('DATE_FORMAT(a.tanggal_masuk, "%M") as bulan'),
            DB::raw('DATE_FORMAT(a.tanggal_masuk, "%Y") as tahun'),
            DB::raw('DATE_FORMAT(a.tanggal_masuk, "%Y-%m") as tgl')
        )
        ->groupBy('b.nama_barang', 'tahun', 'bulan' , 'tgl')
        ->orderBy('tgl')
        ->get();

        $transaksi_keluar = DB::table('transaksi_barang_keluar as a')
        ->join('barang as b', 'a.id_barang', '=', 'b.id')
        ->select(
            'b.nama_barang',
            DB::raw('SUM(a.jumlah_barang_keluar) as jumlah'),
            DB::raw('DATE_FORMAT(a.tanggal_keluar, "%M") as bulan'),
            DB::raw('DATE_FORMAT(a.tanggal_keluar, "%Y") as tahun'),
            DB::raw('DATE_FORMAT(a.tanggal_keluar, "%Y-%m") as tgl')
        )
        ->groupBy('b.nama_barang', 'tahun', 'bulan' , 'tgl')
        ->orderBy('tgl')
        ->get();

        // dd($transaksi_keluar);

        return view('dashboard.pages.dashboard', compact('supplier', 'customer', 'transaksi_masuk','transaksi_keluar','namabarang'));
    }
}
