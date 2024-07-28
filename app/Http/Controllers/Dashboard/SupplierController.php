<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'Master Supplier';
        // $supplierdel = Supplier::latest()->paginate(10);

        $judul = 'Delete Supplier!';
        $text = "Apakah Anda Yakin Mau Menghapus Data Supplier ?";
        confirmDelete($judul, $text);

        // return view('users.index', compact('users'));

        $supplier = Supplier::all();


        return view('dashboard.supplier.index', compact('title', 'supplier'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $title = 'Master Supplier';
        // return view('dashboard.supplier.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

        // $request->validate([
        //     'nama_supplier' => 'required|string|max:255',
        //     'alamat_supplier' => 'required|string|max:255',
        //     'kota_supplier' => 'required|string|max:255',
        //     'benohp_supplier' => 'required|numeric|max:14',
        //     'email_supplier' => 'required|string|lowercase|email|max:255'
        // ]);

        $create = Supplier::create([
            'nama_supplier' => $request->nama_supplier,
            'alamat_supplier' => $request->alamat_supplier,
            'kota_supplier' => $request->kota_supplier,
            'email_supplier' => $request->email_supplier,
            'nohp_supplier' => $request->nohp_supplier,
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
        // $update = DB::table('suppliers')
        //     ->where('id', $request->id) // Menggunakan kondisi untuk memilih supplier yang akan diupdate
        //     ->update([
        //         'nama_supplier' => $request->nama_supplier,
        //         'alamat_supplier' => $request->alamat_supplier,
        //         'kota_supplier' => $request->kota_supplier,
        //         'email_supplier' => $request->email_supplier,
        //         'nohp_supplier' => $request->nohp_supplier,
        //     ]);

        // if (!$update) {
        //     toast('Data Tidak Masuk', 'danger');
        // } else {
        //     toast('Data Berhasil Di Update!', 'success');
        // }

        // return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $idsupplier = Supplier::find($id);

        $hapus = $idsupplier->delete();

        if($hapus){
            toast('Data Berhasil Di Hapus', 'success');
        }else{
            toast('Data Tidak Terhapus', 'error');
        }

        return redirect()->back();
    }


    public function ubah(Request $request)
    {
        $update = DB::table('suppliers')
            ->where('id', $request->id) // Menggunakan kondisi untuk memilih supplier yang akan diupdate
            ->update([
                'nama_supplier' => $request->nama_supplier,
                'alamat_supplier' => $request->alamat_supplier,
                'kota_supplier' => $request->kota_supplier,
                'email_supplier' => $request->email_supplier,
                'nohp_supplier' => $request->nohp_supplier,
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
