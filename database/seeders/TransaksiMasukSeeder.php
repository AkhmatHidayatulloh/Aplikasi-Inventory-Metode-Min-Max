<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TransaksiMasukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('transaksi_barang_masuk')->insert([
            [
                'id' => 1,
                'id_supplier' => 4,
                'id_barang' => 1,
                'tanggal_masuk' => '2024-01-08',
                'jumlah_barang_masuk' => 29,
                'stok_awal_masuk' => 64,
                'stok_akhir_masuk' => 93,
                'status' => 'pending',
                'created_at' => '2024-08-08 12:26:52',
                'updated_at' => '2024-08-08 12:26:52',
            ],
            [
                'id' => 2,
                'id_supplier' => 4,
                'id_barang' => 2,
                'tanggal_masuk' => '2024-01-08',
                'jumlah_barang_masuk' => 2,
                'stok_awal_masuk' => 31,
                'stok_akhir_masuk' => 33,
                'status' => 'pending',
                'created_at' => '2024-08-08 12:27:13',
                'updated_at' => '2024-08-08 12:27:13',
            ],
            [
                'id' => 3,
                'id_supplier' => 4,
                'id_barang' => 1,
                'tanggal_masuk' => '2024-02-08',
                'jumlah_barang_masuk' => 29,
                'stok_awal_masuk' => 83,
                'stok_akhir_masuk' => 112,
                'status' => 'pending',
                'created_at' => '2024-08-08 12:51:28',
                'updated_at' => '2024-08-08 12:51:28',
            ],
            [
                'id' => 4,
                'id_supplier' => 4,
                'id_barang' => 2,
                'tanggal_masuk' => '2024-02-08',
                'jumlah_barang_masuk' => 2,
                'stok_awal_masuk' => 3,
                'stok_akhir_masuk' => 5,
                'status' => 'pending',
                'created_at' => '2024-08-08 13:04:56',
                'updated_at' => '2024-08-08 13:04:56',
            ],
            [
                'id' => 5,
                'id_supplier' => 4,
                'id_barang' => 1,
                'tanggal_masuk' => '2024-03-08',
                'jumlah_barang_masuk' => 6,
                'stok_awal_masuk' => 82,
                'stok_akhir_masuk' => 88,
                'status' => 'pending',
                'created_at' => '2024-08-08 13:06:37',
                'updated_at' => '2024-08-08 13:06:37',
            ],
            [
                'id' => 6,
                'id_supplier' => 4,
                'id_barang' => 2,
                'tanggal_masuk' => '2024-03-08',
                'jumlah_barang_masuk' => 3,
                'stok_awal_masuk' => 5,
                'stok_akhir_masuk' => 8,
                'status' => 'pending',
                'created_at' => '2024-08-08 13:06:47',
                'updated_at' => '2024-08-08 13:06:47',
            ],
            [
                'id' => 7,
                'id_supplier' => 4,
                'id_barang' => 3,
                'tanggal_masuk' => '2024-03-08',
                'jumlah_barang_masuk' => 1,
                'stok_awal_masuk' => 91,
                'stok_akhir_masuk' => 92,
                'status' => 'pending',
                'created_at' => '2024-08-08 13:07:00',
                'updated_at' => '2024-08-08 13:07:00',
            ],
        ]);
    }
}
