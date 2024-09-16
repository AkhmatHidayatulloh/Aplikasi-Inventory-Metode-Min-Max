<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiBarangKeluar extends Model
{
    protected $table = "transaksi_barang_keluar";

    protected $fillable = [
        'id_customer',
        'id_barang',
        'tanggal_keluar',
        'jumlah_barang_keluar',
        'stok_awal_keluar',
        'stok_akhir_keluar',

    ];

    use HasFactory;
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}
