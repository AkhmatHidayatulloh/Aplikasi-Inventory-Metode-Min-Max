<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Barang;
use App\Models\Customer;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\TransaksiBarangKeluar;

class TransaksiKeluarController extends Controller
{
    public function index(Request $request)
    {

        $title = 'Transaksi Barang keluar';

        $customer = Customer::all();

        $barang = Barang::where('stok_barang', '>', 0)->get();

        $countbarang = Barang::count('id');

        $transaksikeluar = DB::table('transaksi_barang_keluar as a')
            ->join('customers as b', 'a.id_customer', '=', 'b.id')
            ->join('barang as c', 'a.id_barang', '=', 'c.id')
            ->select(
                'a.id',
                'b.nama_customer',
                'c.nama_barang',
                'a.tanggal_keluar',
                'a.jumlah_barang_keluar',
                'a.stok_awal_keluar',
                'a.stok_akhir_keluar',
                'a.status'
            )
            ->orderBy('id', 'desc')
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

        return view('dashboard.transaksi_keluar.index', compact('title', 'customer', 'barang',  'countbarang'));
    }

    public function store(Request $request)
    {
        $stokbarang = Barang::where('id', $request->id_barang)->value('stok_barang');

        $stokakhir = $stokbarang - $request->jumlah_keluar;

        // dd(
        //     $stokbarang,
        //     $stokakhir,
        //     $request->input('id_barang', [])
        // );

        $create = TransaksiBarangKeluar::create([
            'id_customer' => $request->id_customer,
            'id_barang' => $request->id_barang,
            'tanggal_keluar' => $request->tanggal_keluar,
            'jumlah_barang_keluar' => $request->jumlah_keluar,
            'stok_awal_keluar' => 0,
            'stok_akhir_keluar' => 0,

        ]);

        if (!$create) {
            toast('Data Tidak keluar', 'error');
        } else {
            toast('Data Berhasil Di Inputkan!', 'success');

            // Barang::where('id', $request->id_barang)->update(['stok_barang' => $stokakhir]);
        }

        return redirect()->back();
    }
}