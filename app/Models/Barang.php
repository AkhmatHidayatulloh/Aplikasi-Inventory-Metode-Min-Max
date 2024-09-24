<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = "barang";

    protected $fillable = [
        'nama_barang',
        'satuan_barang',
        'ukuran_barang',
        'bahan_barang',
        'stok_barang'
    ];

    use HasFactory;


    public function perhitungan()
    {
        return $this->hasOne(PerhitunganMinMax::class, 'id_barang');
    }
}