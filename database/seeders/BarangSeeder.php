<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('barang')->insert([
            'nama_barang' => 'Pipa PE 1/2',
            'satuan_barang' => 'meter',
            'ukuran_barang' => '0.50',
            'bahan_barang' => 'HDPE',
            'stok_barang' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('barang')->insert([
            'nama_barang' => 'Pipa PE 3/4',
            'satuan_barang' => 'meter',
            'ukuran_barang' => '0.75',
            'bahan_barang' => 'HDPE',
            'stok_barang' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('barang')->insert([
            'nama_barang' => 'Pipa PE 1',
            'satuan_barang' => 'meter',
            'ukuran_barang' => '1',
            'bahan_barang' => 'HDPE',
            'stok_barang' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        DB::table('barang')->insert([
            'nama_barang' => 'Pipa PE 1 1/2',
            'satuan_barang' => 'meter',
            'ukuran_barang' => '1.50',
            'bahan_barang' => 'PVC',
            'stok_barang' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('barang')->insert([
            'nama_barang' => 'Pipa PE 3',
            'satuan_barang' => 'meter',
            'ukuran_barang' => '3',
            'bahan_barang' => 'HDPE',
            'stok_barang' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('barang')->insert([
            'nama_barang' => 'Pipa PE 4',
            'satuan_barang' => 'meter',
            'ukuran_barang' => '4',
            'bahan_barang' => 'HDPE',
            'stok_barang' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('barang')->insert([
            'nama_barang' => 'Pipa PE 6',
            'satuan_barang' => 'meter',
            'ukuran_barang' => '6',
            'bahan_barang' => 'HDPE',
            'stok_barang' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('barang')->insert([
            'nama_barang' => 'Pipa PVC 1',
            'satuan_barang' => 'meter',
            'ukuran_barang' => '1',
            'bahan_barang' => 'PVC',
            'stok_barang' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('barang')->insert([
            'nama_barang' => 'Pipa PVC 1 1/4',
            'satuan_barang' => 'meter',
            'ukuran_barang' => '1.25',
            'bahan_barang' => 'PVC',
            'stok_barang' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('barang')->insert([
            'nama_barang' => 'Pipa PVC 1 1/2',
            'satuan_barang' => 'meter',
            'ukuran_barang' => '1.50',
            'bahan_barang' => 'PVC',
            'stok_barang' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('barang')->insert([
            'nama_barang' => 'Pipa PVC 2',
            'satuan_barang' => 'meter',
            'ukuran_barang' => '2',
            'bahan_barang' => 'PVC',
            'stok_barang' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('barang')->insert([
            'nama_barang' => 'Pipa PVC 4',
            'satuan_barang' => 'meter',
            'ukuran_barang' => '4',
            'bahan_barang' => 'PVC',
            'stok_barang' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('barang')->insert([
            'nama_barang' => 'Pipa PVC 6',
            'satuan_barang' => 'meter',
            'ukuran_barang' => '6',
            'bahan_barang' => 'PVC',
            'stok_barang' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('barang')->insert([
            'nama_barang' => 'Pipa PVC 16',
            'satuan_barang' => 'meter',
            'ukuran_barang' => '16',
            'bahan_barang' => 'PVC',
            'stok_barang' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
