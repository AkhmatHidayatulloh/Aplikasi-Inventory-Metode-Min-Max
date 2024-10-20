<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Barang;
use Yajra\DataTables\Facades\DataTables;

class laporanPerhitungan extends Controller
{
    public function index(Request $request)
    {
        $data_perhitungan = DB::table('perhitungan_min_maxes as a')
            ->join('users as b', 'a.id_user', '=', 'b.id')
            ->join('barang as c', 'a.id_barang', '=', 'c.id')
            ->select(
                'a.id',
                'b.name',
                'id_barang',
                'c.nama_barang',
                'a.tgl_perhitungan',
                'a.bulan_tahun',
                'a.leadtime',
                'a.permintaan_rata',
                'a.permintaan_max',
                'a.safety_stock',
                'a.min',
                'a.max',
                'a.order_quantity',
                'a.created_at',
                'a.updated_at'
            )
            ->orderBy('id', 'desc')
            ->get();

        if ($request->ajax()) {
            return DataTables::of($data_perhitungan)
                ->addIndexColumn()
                ->make(true);
        }

        $title = 'Perhitungan Min Max';
        $barang = Barang::all();

        return view('dashboard.laporan.laporan_perhitungan', data: compact('title', 'barang'));
    }
}