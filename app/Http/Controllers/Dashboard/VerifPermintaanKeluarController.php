<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Barang;
use App\Models\Customer;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\TransaksiBarangKeluar;

class VerifPermintaanKeluarController extends Controller
{
    public function index(Request $request)
    {

        $title = 'Vrifikasi Barang keluar';

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
                ->addColumn('action', function ($data) {
                    $disableCondition = ($data->status == 'berhasil' || $data->status == 'ditolak') ? 'disabled' : '';

                    return '
                        <button type="button" id="tombolverif" class="btn btn-success"
                            data-toggle="modal" data-target="#modalVerif"
                            data-id="' . $data->id . '"
                            data-jumlah="' . $data->jumlah_barang_keluar . '" ' . $disableCondition . '>
                            Verifikasi
                        </button>

                        <button type="button" id="tomboltolak" class="btn btn-danger"
                            data-toggle="modal" data-target="#modalTolak"
                            data-id="' . $data->id . '" ' . $disableCondition . '>
                            Tolak
                        </button>';
                })
                ->addColumn('status', function ($data) {
                    if ($data->status == 'berhasil') {
                        return '<small class="badge badge-success">' . $data->status . '</small>';
                    } elseif ($data->status == 'ditolak') {
                        return '<small class="badge badge-danger">' . $data->status . '</small>';
                    } else {
                        return '<small class="badge badge-warning">' . $data->status . '</small>';
                    }
                })
                ->rawColumns(['status', 'action']) // Pastikan kolom action dan status bisa dirender dengan HTML
                ->make(true);
        }



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
