<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Barang;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class laporanTransaksiKeluar extends Controller
{
    public function index(Request $request)
    {

        $title = 'Laporan Transaksi Barang keluar';

        $barang = Barang::all();
        $customer = Customer::all();

        $transaksikeluar = DB::table('transaksi_barang_keluar as a')
            ->join('customers as b', 'a.id_customer', '=', 'b.id')
            ->join('barang as c', 'a.id_barang', '=', 'c.id')
            ->select(
                'a.id',
                'a.id_barang',
                'a.id_customer',
                'b.nama_customer',
                'c.nama_barang',
                'a.tanggal_keluar',
                'a.jumlah_barang_keluar',
                'a.stok_awal_keluar',
                'a.stok_akhir_keluar',
                'a.status'
            )
            ->orderBy('a.id', 'desc')
            ->get();


        if ($request->ajax()) {
            return DataTables::of($transaksikeluar)
                ->addIndexColumn()
                ->addColumn('status', function ($data) {
                    if ($data->status == 'berhasil') {
                        return '<small class="badge badge-success">' . $data->status . '</small>';
                    } elseif ($data->status == 'ditolak') {
                        return '<small class="badge badge-danger">' . $data->status . '</small>';
                    } else {
                        return '<small class="badge badge-warning">' . $data->status . '</small>';
                    }
                })
                ->rawColumns(['status'])
                ->make(true);
        }

        //dd($transaksikeluar);
        return view('dashboard.laporan.index', compact('title', 'barang', 'customer'));
    }
}
