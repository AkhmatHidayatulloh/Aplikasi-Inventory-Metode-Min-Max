<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiBarangKeluar extends Model
{
    protected $table = "transaksi_barang_keluar";

    protected $fillable =[
        'tanggal_keluar',
        'jumlah_barang_keluar',
        'stok_awal_keluar',
        'stok_akhir_keluar',

    ];

    use HasFactory;
}
