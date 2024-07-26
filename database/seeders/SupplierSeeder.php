<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        

            DB::table('suppliers')->insert([
                'nama_supplier' => 'PT Kusmawati Hakim (Persero) Tbk',
                'alamat_supplier' => 'Psr. Imam No. 184, Sawahlunto 81287, Sumut',
                'kota_supplier' => 'Banda Aceh',
                'email_supplier' => 'warsita72@gmail.com',
                'nohp_supplier' => '0428 7646 9285',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('suppliers')->insert([
                'nama_supplier' => 'Fa Permata Mustofa',
                'alamat_supplier' => 'Psr. Antapani Lama No. 218, Ternate 85398, Maluku',
                'kota_supplier' => 'Serang',
                'email_supplier' => 'pandu69@hariyah.biz',
                'nohp_supplier' => '0385 6970 859',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('suppliers')->insert([
                'nama_supplier' => 'PJ Saragih Wijaya Tbk',
                'alamat_supplier' => 'Ki. Camar No. 807, Ternate 74494, Papua',
                'kota_supplier' => 'Sukabumi',
                'email_supplier' => 'halima75@yuniar.net',
                'nohp_supplier' => '0989 6829 313',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('suppliers')->insert([
                'nama_supplier' => 'CV Manullang Haryanti',
                'alamat_supplier' => 'Jr. Cikutra Barat No. 290, Pontianak 87303, Sulsel',
                'kota_supplier' => 'Bima',
                'email_supplier' => 'ami70@yahoo.co.id',
                'nohp_supplier' => '0404 9695 9191',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('suppliers')->insert([
                'nama_supplier' => 'PD Mansur',
                'alamat_supplier' => 'Ds. Baja No. 586, Cilegon 91934, Kalsel',
                'kota_supplier' => 'Tangerang',
                'email_supplier' => 'wahyuni.keisha@samosir.sch.id',
                'nohp_supplier' => '(+62) 803 0760 9579',   
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('suppliers')->insert([
                'nama_supplier' => 'Perum Laksita Napitupulu (Persero) Tbk',
                'alamat_supplier' => 'Psr. Sutarto No. 430, Madiun 78654, DIY',
                'kota_supplier' => 'Parepare',
                'email_supplier' => 'okuswoyo@gmail.com',
                'nohp_supplier' => '(+62) 632 1186 4829',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('suppliers')->insert([
                'nama_supplier' => 'PD Mayasari Yulianti',
                'alamat_supplier' => 'Psr. Bata Putih No. 959, Mojokerto 46475, Lampung',
                'kota_supplier' => 'Cimahi',
                'email_supplier' => 'csetiawan@gmail.co.id',
                'nohp_supplier' => '0453 5765 285',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('suppliers')->insert([
                'nama_supplier' => 'PD Andriani Pratama (Persero) Tbk',
                'alamat_supplier' => 'Jr. Bakit  No. 357, Padangpanjang 34104, NTT',
                'kota_supplier' => 'Makassar',
                'email_supplier' => 'qsitumorang@gmail.com',
                'nohp_supplier' => '(+62) 997 9367 721',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('suppliers')->insert([
                'nama_supplier' => 'UD Sihombing Tbk',
                'alamat_supplier' => 'Gg. Ters. Pasir Koja No. 420, Administrasi Jakarta Selatan 62554, DKI Jakarta',
                'kota_supplier' => 'Tual',
                'email_supplier' => 'dagel93@mardhiyah.net',
                'nohp_supplier' => '0524 6826 8447',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('suppliers')->insert([
                'nama_supplier' => 'PJ Mulyani Rahimah Tbk',
                'alamat_supplier' => 'Dk. Eka No. 878, Pekanbaru 67683, Sultra',
                'kota_supplier' => 'Denpasar',
                'email_supplier' => 'eman.farida@gmail.co.id',
                'nohp_supplier' => '0476 7544 8557',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        
    }
}
