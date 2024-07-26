<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'nama_supplier',
        'alamat_supplier',
        'kota_supplier',
        'email_supplier',
        'nohp_supplier'
    ];
    
    use HasFactory;
}
