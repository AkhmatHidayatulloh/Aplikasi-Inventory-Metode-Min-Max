<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiBarangMasuk extends Model
{
    
    protected $table = "transaksi_barang_masuk";

    protected $fillable =[
        'tanggal_masuk',
        'jumlah_barang_masuk',
        'stok_awal_masuk',
        'stok_akhir_masuk',

    ];

    use HasFactory;
}
