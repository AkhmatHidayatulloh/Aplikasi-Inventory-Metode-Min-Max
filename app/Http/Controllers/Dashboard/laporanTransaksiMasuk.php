<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Barang;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class laporanTransaksiMasuk extends Controller
{
    public function index(Request $request)
    {

        $title = 'Transaksi Barang Masuk';

        $supplier = Supplier::orderBy('nama_supplier')->get();

        $barang = Barang::all();

        $transaksimasuk = DB::table('transaksi_barang_masuk as a')
            ->join('suppliers as b', 'a.id_supplier', '=', 'b.id')
            ->join('barang as c', 'a.id_barang', '=', 'c.id')
            ->select(
                'a.id',
                'id_supplier',
                'id_barang',
                'b.nama_supplier',
                'c.nama_barang',
                'a.tanggal_masuk',
                'a.jumlah_barang_masuk',
                'a.stok_awal_masuk',
                'a.stok_akhir_masuk',
                'a.status'
            )
            ->orderBy('id', 'desc')
            ->get();

        if ($request->ajax()) {
            return DataTables::of($transaksimasuk)
                ->addIndexColumn()
                ->make(true);
        }

        return view('dashboard.laporan.laporan_masuk', data: compact('title', 'supplier', 'barang'));
    }
}