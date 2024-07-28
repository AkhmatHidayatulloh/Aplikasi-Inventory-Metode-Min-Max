<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BarangController extends Controller
{
    public function index()
    {
        $title = 'Master Barang';

        $judul = 'Delete Barang!';
        $text = "Apakah Anda Yakin Mau Menghapus Data Barang ?";
        confirmDelete($judul, $text);

        $barang = Barang::all();

        return view('dashboard.barang.index', compact('title', 'barang'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $create = Barang::create([
            'nama_barang' => $request->nama_barang,
            'satuan_barang' => $request->satuan_barang,
            'ukuran_barang' => $request->ukuran_barang,
            'bahan_barang' => $request->bahan_barang,
            'stok_barang' => $request->stok_barang,
        ]);

        if (!$create) {
            toast('Data Tidak Masuk', 'error');
        } else {
            toast('Data Berhasil Di Inputkan!', 'success');
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $idbarang = Barang::find($id);

        $hapus = $idbarang->delete();

        if($hapus){
            toast('Data Berhasil Di Hapus', 'success');
        }else{
            toast('Data Tidak Terhapus', 'error');
        }

        return redirect()->back();
    }

    public function ubah(Request $request)
    {
        $update = DB::table('barang')
            ->where('id', $request->id) // Menggunakan kondisi untuk memilih barang yang akan diupdate
            ->update([
                'nama_barang' => $request->nama_barang,
                'satuan_barang' => $request->satuan_barang,
                'ukuran_barang' => $request->ukuran_barang,
                'bahan_barang' => $request->bahan_barang,
                'stok_barang' => $request->stok_barang,
            ]);

        if (!$update) {
            toast('Data Tidak Masuk', 'error');
            //alert()->question('QuestionAlert','Data Tidak Masuk.');
        } else {
            toast('Data Berhasil Di Update!', 'success');
            // alert()->success('SuccessAlert','Data Berhasil Di Update!');
        }

        return redirect()->back();
    }
}
