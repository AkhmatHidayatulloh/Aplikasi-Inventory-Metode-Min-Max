<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Master Customer';

        $judul = 'Delete Customer!';
        $text = "Apakah Anda Yakin Mau Menghapus Data Customer ?";
        confirmDelete($judul, $text);

        $customer = Customer::all();

        return view('dashboard.customer.index', compact('title','customer'));
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
        $create = Customer::create([
            'nama_customer' => $request->nama_customer,
            'alamat_customer' => $request->alamat_customer,
            'kota_customer' => $request->kota_customer,
            'email_customer' => $request->email_customer,
            'nohp_customer' => $request->nohp_customer,
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
        $idcustomer = Customer::find($id);

        $hapus = $idcustomer->delete();

        if($hapus){
            toast('Data Berhasil Di Hapus', 'success');
        }else{
            toast('Data Tidak Terhapus', 'error');
        }

        return redirect()->back();
    }
    
    public function ubah(Request $request)
    {
        $update = DB::table('customers')
            ->where('id', $request->id) // Menggunakan kondisi untuk memilih customer yang akan diupdate
            ->update([
                'nama_customer' => $request->nama_customer,
                'alamat_customer' => $request->alamat_customer,
                'kota_customer' => $request->kota_customer,
                'email_customer' => $request->email_customer,
                'nohp_customer' => $request->nohp_customer,
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
