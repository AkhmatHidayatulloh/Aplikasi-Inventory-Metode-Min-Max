<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_barang',
        'bulan_tahun_notif',
        'title',
        'message',
        'is_read',
    ];
    // public function checkStock()
    // {
    //     if ($this->stock < $this->min_stock) {
    //         Notification::create([
    //             'title' => 'Restock Needed',
    //             'message' => "The stock of {$this->name} is below the minimum level.",
    //         ]);
    //     }
    // }
}