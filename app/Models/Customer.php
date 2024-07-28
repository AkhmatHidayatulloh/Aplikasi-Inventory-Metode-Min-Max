<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'nama_customer',
        'alamat_customer',
        'kota_customer',
        'email_customer',
        'nohp_customer'
    ];
    
    use HasFactory;
}
