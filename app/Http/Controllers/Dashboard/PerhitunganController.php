<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class PerhitunganController extends Controller
{
    public function index()
    {
        $title = 'Perhitungan Min Max';
        $barang = Barang::where('stok_barang', '>', 0)->get();

        return view('dashboard.perhitungan.index', compact('title', 'barang'));
    }

    public function store(Request $request)
    {
        $id_barang = $request->id_barang;
        $tgl_perhitungan = Carbon::createFromFormat('Y-m-d', $request->tgl_perhitungan);
        $tglformat = date_format($tgl_perhitungan, 'm Y');
        $leadtime = 30;
        $result = DB::table('transaksi_barang_keluar')
            ->selectRaw('
                SUM(jumlah_barang_keluar) as jumlah,
                AVG(jumlah_barang_keluar) as rata,
                MAX(jumlah_barang_keluar) as max,
                nama_barang')
            ->join('barang', 'barang.id', '=', 'id_barang')
            ->whereRaw("DATE_FORMAT(tanggal_keluar, '%m %Y') = '$tglformat'")
            ->where('status', 'berhasil')
            ->where('id_barang', $id_barang)
            ->groupBy('nama_barang')
            ->first();
        $safety = ($result->max - ceil($result->rata)) * $leadtime;
        $max = 2 * (ceil($result->rata) * $leadtime) + $safety;
        $min = (ceil($result->rata) * $leadtime) + $safety;
        $order = $max - $min;

        $data = [
            'permintaan_rata' => ceil($result->rata),
            'permintaan_max' => $result->max,
            'leadtime' => $leadtime,
            'max' => $max,
            'min' => $min,
            'safetystock' => $safety,
            'order' => $order,
            'nama_barang' => $result->nama_barang
        ];
        // dd(
        //     $id_barang,
        //     ceil($result->rata),
        //     $safety,
        //     $max,
        //     $min,
        //     $order,
        //     $data
        // );
        Alert::success('Perhitungan Berhasil', 'Hasil Sudah Dapat Dilihat');

        return redirect()->back()->with('hasil', $data);
    }
}
