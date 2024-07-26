<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'Master Supplier'; 
        // $users = User::latest()->paginate(10);

        // $title = 'Delete User!';
        // $text = "Are you sure you want to delete?";
        // confirmDelete($title, $text);
        // return view('users.index', compact('users'));
        $supplier = Supplier::all();

        
        return view('dashboard.supplier.index', compact('title', 'supplier'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $title = 'Master Supplier'; 
        return view('dashboard.supplier.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'nama_supplier' => ['required', 'string', 'max:255'],
        //     'alamat_supplier' => ['required', 'string', 'max:255'],
        //     'kota_supplier' => ['required', 'string', 'max:255'],
        //     'email_supplier' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Supplier::class],
        //     'nohp_supplier' => ['required', 'adasdasd', 'max:14'],
        // ]);

  
        $create = Supplier::create([
            'nama_supplier' => $request->nama_supplier,
            'alamat_supplier' => $request->alamat_supplier,
            'kota_supplier' => $request->kota_supplier,
            'email_supplier' => $request->email_supplier,
            'nohp_supplier' => $request->nohp_supplier,
        ]);

        if(!$create){
            toast('Data Tidak Masuk','danger');
        }else{
            toast('Data Berhasil Di Inputkan!','success');
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
        //
    }
}
