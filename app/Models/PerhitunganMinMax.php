<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerhitunganMinMax extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_barang',
        'tgl_perhitungan',
        'bulan_tahun',
        'leadtime',
        'permintaan_rata',
        'permintaan_max',
        'safety_stock',
        'min',
        'max',
        'order_quantity'
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}