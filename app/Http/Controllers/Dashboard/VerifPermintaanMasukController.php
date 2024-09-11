<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Barang;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\TransaksiBarangKeluar;

class VerifPermintaanMasukController extends Controller
{
    public function index()
    {

        $title = 'Vrifikasi Barang keluar';

        // $customer = Customer::all();

        // $barang = Barang::where('stok_barang', '>', 0)->get();

        // $countbarang = Barang::count('id');

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



        return view('dashboard.transaksi_keluar.verifikasi_permintaan', compact('title', 'transaksikeluar'));
    }

    public function verif(Request $request)
    {

        $status = 'berhasil';

        $id_barang = TransaksiBarangKeluar::where('id', $request->id)->value('id_barang');
        $stokbarang = Barang::where('id', $id_barang)->value('stok_barang');
        $stokakhir = $stokbarang - $request->jumlah_keluar;

        $update = TransaksiBarangKeluar::where('id', $request->id)->update(['stok_awal_keluar' => $stokbarang, 'stok_akhir_keluar' => $stokakhir, 'status' => $status]);

        if (!$update) {
            toast('Data Gagal Di Verifikasi! ', 'danger');
        } else {
            toast('Data Berhasil Di Verifikasi! ', 'success');
            Barang::where('id', $id_barang)->update(['stok_barang' => $stokakhir]);
        }

        return redirect()->back();
    }

    public function tolak(Request $request)
    {
        $status = 'ditolak';
        $update = TransaksiBarangKeluar::where('id', $request->id)->update(['status' => $status]);
        if (!$update) {
            toast('Data Gagal Diproses ', 'danger');
        } else {
            toast('Data Permintaan Barang Keluar Ditolak ', 'info');
        }

        return redirect()->back();
    }
}
