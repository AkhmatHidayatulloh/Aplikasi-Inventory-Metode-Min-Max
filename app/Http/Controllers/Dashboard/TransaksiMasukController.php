<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Barang;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\TransaksiBarangMasuk;

class TransaksiMasukController extends Controller
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

        return view('dashboard.transaksi_masuk.index', compact('title', 'supplier', 'barang'));
    }

    public function store(Request $request)
    {
        $stokbarang = Barang::where('id', $request->id_barang)->value('stok_barang');

        $stokakhir = $stokbarang + $request->jumlah_masuk;
        // dd(
        //     $stokbarang,
        //     $stokakhir,
        //     $request->all()
        // );

        $create = TransaksiBarangMasuk::create([
            'id_supplier' => $request->id_supplier,
            'id_barang' => $request->id_barang,
            'tanggal_masuk' => $request->tanggal_masuk,
            'jumlah_barang_masuk' => $request->jumlah_masuk,
            'stok_awal_masuk' => $stokbarang,
            'stok_akhir_masuk' => $stokakhir,
        ]);

        if (!$create) {
            toast('Data Tidak Masuk', 'error');
        } else {
            toast('Data Berhasil Di Inputkan!', 'success');

            Barang::where('id', $request->id_barang)->update(['stok_barang' => $stokakhir]);
        }

        return redirect()->back();
    }
}