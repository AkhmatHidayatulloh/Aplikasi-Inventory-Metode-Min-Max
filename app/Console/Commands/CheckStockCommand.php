<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Barang;
use App\Models\Notification;
use App\Models\PerhitunganMinMax;
use Illuminate\Console\Command;

class CheckStockCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stock:check';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check product stock levels and create notifications for low stock';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tglhariini = Carbon::now()->format('m Y'); // Mendapatkan bulan dan tahun saat ini


        $perhitungan = PerhitunganMinMax::with(relations: 'barang')
            ->whereRaw("DATE_FORMAT(tgl_perhitungan, '%m %Y') = '01 2024'")
            ->get();


        foreach ($perhitungan as $hasil) {

            $stok = $hasil->barang->stok_barang ?? 0; // Mengambil min_stock dari tabel terkait

            if ($stok < $hasil->min) {
                $id_barang = $hasil->id_barang;

                Notification::updateOrCreate(
                    [
                        'id_barang' => $id_barang,
                        'bulan_tahun_notif' => '01 2024'

                    ],
                    [
                        'id_barang' => $id_barang,
                        'bulan_tahun_notif' => '01 2024',
                        'title' => "Segera Restock {$hasil->barang->nama_barang}",
                        'message' => "Stok Barang {$hasil->barang->nama_barang} Dibawah Batas Minimum Dari {$hasil->min}.",
                    ]
                );
            }
        }

        $this->info('Berhasil Mengecek stok Barang.');
    }
}
