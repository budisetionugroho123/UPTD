<?php

namespace Database\Seeders;

use App\Models\StatusPesanan;
use Illuminate\Database\Seeder;

class StatusPesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $dataStatus = [
            [
                'status' => 'belum_konfirmasi',
                'label' => 'Belum konfirmasi'
            ],
            [
                'status' => 'sudah_konfirmasi',
                'label' => 'Sudah konfirmasi'
            ],
            [
                'status' => 'proses_analisis',
                'label' => 'Proses Analisis'
            ],
            [
                'status' => 'proses_validasi_data',
                'label' => 'Proses Validasi Data'
            ],
            [
                'status' => 'proses_pengesahan_shu',
                'label' => 'Proses Pengesahan SHU'
            ],

            [
                'status' => 'pengesahan_shu_selesai',
                'label' => 'Pengesahan SHU Selesai'
            ],

        ];
        foreach ($dataStatus as $status) {
            StatusPesanan::create($status);
        }
    }
}
