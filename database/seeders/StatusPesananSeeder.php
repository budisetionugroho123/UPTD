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
                'status' => 'analisis_selesai_waiting_validasi',
                'label' => 'Analisis Selesai & Waiting Validasi'
            ],
            [
                'status' => 'lolos_validasi_data',
                'label' => 'Lolos Validasi Data'
            ],
            [
                'status' => 'tidak_lolos_validasi_data',
                'label' => 'Tidak Lolos Validasi Data'
            ],
            [
                'status' => 'lolos_validasi_berkas',
                'label' => 'Lolos Validasi Berkas (LHUS & SHU)'
            ],
            [
                'status' => 'tidak_lolos_validasi_berkas',
                'label' => 'Tidak Lolos Validasi Berkas (LHUS & SHU)'
            ],
            [
                'status' => 'sudah_disahkan',
                'label' => 'Sudah Disahkan'
            ],
        ];
        foreach ($dataStatus as $status) {
            StatusPesanan::create($status);
        }
    }
}
