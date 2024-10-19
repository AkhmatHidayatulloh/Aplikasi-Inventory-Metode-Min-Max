<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Barang;
use Illuminate\Http\Request;
use App\Models\PerhitunganMinMax;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;

class PerhitunganController extends Controller
{
    public function index(Request $request)
    {
        $data_perhitungan = DB::table('perhitungan_min_maxes as a')
            ->join('users as b', 'a.id_user', '=', 'b.id')
            ->join('barang as c', 'a.id_barang', '=', 'c.id')
            ->select(
                'a.id',
                'b.name',
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
        $barang = Barang::where('stok_barang', '>', 0)->get();

        return view('dashboard.perhitungan.index', compact('title', 'barang'));
    }

    public function store(Request $request)
    {

        $id_barang = $request->id_barang;
        // $tgl_perhitungan = Carbon::createFromFormat('Y-m-d', $request->tgl_perhitungan);
        // $tglformat = date_format($tgl_perhitungan, 'm Y');

        $tglformat = $request->tgl_perhitungan;

        $result = DB::table('transaksi_barang_keluar')
            ->selectRaw('
                    SUM(jumlah_barang_keluar) as jumlah,
                    AVG(jumlah_barang_keluar) as rata,
                    MAX(jumlah_barang_keluar) as max,
                    nama_barang,
                    id_barang,
                    date_format(`tanggal_keluar`, "%m %Y") as bulan')
            ->join('barang', 'barang.id', '=', 'id_barang')
            ->whereRaw("DATE_FORMAT(tanggal_keluar, '%Y') = '$tglformat'")
            ->where('status', 'berhasil')
            ->where('id_barang', $id_barang)
            ->groupBy('nama_barang', 'id_barang', 'bulan')
            ->get();

        $perhitungan = $result->map(function ($result) {

            $parts = explode(' ', $result->bulan);
            $month = $parts[0];
            $year = $parts[1];
            // Membuat objek Carbon
            $date = Carbon::createFromFormat('m Y', $month . ' ' . $year);

            // Menambah 1 tahun
            $tgl1 = $date->addYear();

            $tgl_perhitungan = $tgl1;
            $tglformat = $tgl1->format('m Y');
            $leadtime = 7;
            $safety = ($result->max - ceil($result->rata)) * $leadtime;
            $max = 2 * (ceil($result->rata) * $leadtime) + $safety;
            $min = (ceil($result->rata) * $leadtime) + $safety;
            $order = $max - $min;
            $iduser = Auth::user()->id;

            // $data = [
            //     'permintaan_rata' => ceil($result->rata),
            //     'permintaan_max' => $result->max,
            //     'leadtime' => $leadtime,
            //     'max' => $max,
            //     'min' => $min,
            //     'safety_stock' => $safety,
            //     'order' => $order,
            //     'nama_barang' => $result->nama_barang
            // ];

            $create = PerhitunganMinMax::Create(
                [
                    'id_user' => $iduser,
                    'id_barang' => $result->id_barang,
                    'tgl_perhitungan' => $tgl_perhitungan,
                    'bulan_tahun' => $tglformat,
                    'leadtime' => $leadtime,
                    'permintaan_rata' => ceil($result->rata),
                    'permintaan_max' => $result->max,
                    'safety_stock' => $safety,
                    'min' => $min,
                    'max' => $max,
                    'order_quantity' => $order,
                ] // Data yang akan di-update atau dibuat
            );
        });



        if (!$perhitungan) {
            Alert::danger('Perhitungan Gagal', 'Coba Ulangi Lagi');
        } else {
            Alert::success('Perhitungan Berhasil', 'Hasil Sudah Dapat Dilihat');
        }

        return redirect()->back()->with('hasil');
    }
}
