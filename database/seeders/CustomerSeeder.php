<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $customers = [
            [
                'nama_customer' => 'Kamal Mahendra',
                'alamat_customer' => 'Jr. Ekonomi No. 291, Tangerang 70620, NTB',
                'kota_customer' => 'Bandar Lampung',
                'email_customer' => 'kamal.mahendra@example.com',
                'nohp_customer' => '(+62) 402 0953 292',
                'created_at' => '2024-07-27 03:43:32',
                'updated_at' => '2024-07-27 03:43:32',
            ],
            [
                'nama_customer' => 'Aisyah Astuti',
                'alamat_customer' => 'Ki. Jend. Sudirman No. 20, Tebing Tinggi 58404, Su...',
                'kota_customer' => 'Solok',
                'email_customer' => 'aisyah.astuti@example.com',
                'nohp_customer' => '0984 7624 4905',
                'created_at' => '2024-07-27 03:43:32',
                'updated_at' => '2024-07-27 03:43:32',
            ],
            [
                'nama_customer' => 'Laksana Kemba Natsir S.Psi',
                'alamat_customer' => 'Kpg. Basmol Raya No. 18, Ternate 90122, Sumsel',
                'kota_customer' => 'Pekalongan',
                'email_customer' => 'laksana.kemba.natsir.s.psi@example.com',
                'nohp_customer' => '(+62) 20 8716 835',
                'created_at' => '2024-07-27 03:43:32',
                'updated_at' => '2024-07-27 03:43:32',
            ],
            [
                'nama_customer' => 'Cakrabuana Virman Prasasta',
                'alamat_customer' => 'Kpg. Rajawali Barat No. 496, Cimahi 30928, Sultra',
                'kota_customer' => 'Salatiga',
                'email_customer' => 'cakrabuana.virman.prasasta@example.com',
                'nohp_customer' => '(+62) 529 3511 593',
                'created_at' => '2024-07-27 03:43:32',
                'updated_at' => '2024-07-27 03:43:32',
            ],
            [
                'nama_customer' => 'Gantar Kuswoyo S.Gz',
                'alamat_customer' => 'Ds. Pasteur No. 867, Tanjung Pinang 18606, Goronta...',
                'kota_customer' => 'Bima',
                'email_customer' => 'gantar.kuswoyo.s.gz@example.com',
                'nohp_customer' => '0745 9543 222',
                'created_at' => '2024-07-27 03:43:32',
                'updated_at' => '2024-07-27 03:43:32',
            ],
            [
                'nama_customer' => 'Gandi Asmuni Tarihoran S.IP',
                'alamat_customer' => 'Psr. R.M. Said No. 640, Dumai 91136, DIY',
                'kota_customer' => 'Bitung',
                'email_customer' => 'gandi.asmuni.tarihoran.s.ip@example.com',
                'nohp_customer' => '(+62) 253 3241 279',
                'created_at' => '2024-07-27 03:43:32',
                'updated_at' => '2024-07-27 03:43:32',
            ],
            [
                'nama_customer' => 'Karimah Hartati',
                'alamat_customer' => 'Psr. Suprapto No. 324, Binjai 44042, Gorontalo',
                'kota_customer' => 'Palembang',
                'email_customer' => 'karimah.hartati@example.com',
                'nohp_customer' => '(+62) 700 9140 178',
                'created_at' => '2024-07-27 03:43:32',
                'updated_at' => '2024-07-27 03:43:32',
            ],
            [
                'nama_customer' => 'Ajiman Napitupulu',
                'alamat_customer' => 'Ki. Pahlawan No. 842, Kediri 33357, Jateng',
                'kota_customer' => 'Mojokerto',
                'email_customer' => 'ajiman.napitupulu@example.com',
                'nohp_customer' => '0797 8021 6247',
                'created_at' => '2024-07-27 03:43:32',
                'updated_at' => '2024-07-27 03:43:32',
            ],
            [
                'nama_customer' => 'Rika Handayani',
                'alamat_customer' => 'Ki. Jambu No. 629, Bogor 32282, Sumut',
                'kota_customer' => 'Bekasi',
                'email_customer' => 'rika.handayani@example.com',
                'nohp_customer' => '(+62) 634 4796 9008',
                'created_at' => '2024-07-27 03:43:32',
                'updated_at' => '2024-07-27 03:43:32',
            ],
            [
                'nama_customer' => 'Ridwan Latupono',
                'alamat_customer' => 'Kpg. Ciumbuleuit No. 492, Bekasi 27014, Jambi',
                'kota_customer' => 'Semarang',
                'email_customer' => 'ridwan.latupono@example.com',
                'nohp_customer' => '0829 3514 1170',
                'created_at' => '2024-07-27 03:43:32',
                'updated_at' => '2024-07-27 03:43:32',
            ],
        ];

        DB::table('customers')->insert($customers);
    }
}
