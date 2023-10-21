<?php

namespace Database\Seeders;

use App\Models\Layanan;
use App\Models\Pengujian;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $layanan = [
            [
                'uuid' => Str::uuid(),
                'nama_layanan' => "Uji Kualitas Air Limbah",
                'kode_sampel' =>  "air_limbah",
                'jenis_sampel' => "Air Limbah",
                'acuan_pengambilan_sampel' => "SNI 6989.59:2008",
                'antar_lab' => 1,
                'datang_ke_lokasi' => 1,
                'identitas_layanan' => "A.L"
            ],
            [
                'uuid' => Str::uuid(),
                'nama_layanan' => "Uji Kualitas Air Higiene & Sanitasi",
                'kode_sampel' =>  "air_higiene_dan_sanitasi",
                'jenis_sampel' => "Air Higiene dan Sanitasi",
                'acuan_pengambilan_sampel' => "SNI 6989.58:2008",
                'antar_lab' => 1,
                'datang_ke_lokasi' => 1,
                'identitas_layanan' => "A.B"
            ],
            [
                'uuid' => Str::uuid(),
                'nama_layanan' => "Uji Kualitas Air Permukaan",
                'kode_sampel' =>  "air_permukaan",
                'jenis_sampel' => "Air Permukaan",
                'acuan_pengambilan_sampel' => "SNI 6989.57:2008",
                'antar_lab' => 1,
                'datang_ke_lokasi' => 1,
                'identitas_layanan' => "A.P"
            ],
            [
                'uuid' => Str::uuid(),
                'nama_layanan' => "Uji Kualitas Udara Ambien",
                'kode_sampel' =>  "udara_ambien",
                'jenis_sampel' => "Udara Ambien",
                'acuan_pengambilan_sampel' => "SNI 19-7119.6:2005",
                'antar_lab' => 1,
                'datang_ke_lokasi' => 1,
                'identitas_layanan' => "U.A"

            ]
        ];
        foreach ($layanan as $l) {
            Layanan::create($l);
        }

        $airLimbah = Layanan::where('kode_sampel', 'air_limbah')->first();
        $airHigiene = Layanan::where('kode_sampel', 'air_higiene_dan_sanitasi')->first();
        $airPermukaan = Layanan::where('kode_sampel', 'air_permukaan')->first();
        $udaraAmbien = Layanan::where('kode_sampel', 'udara_ambien')->first();
        $pengujianAirLimbah = [
            [
                'uuid' => Str::uuid(),
                'layanan_id' => $airLimbah->id,
                'nama_pengujian' => 'pH',
                'jenis_parameter' => 'Parameter Kimia',
                'satuan' => '-',
                'baku_mutu' => '6-9',
                'metode' => 'SNI',
                'acuan_metoda_pengujian' => 'SNI 06-6989.11-2004',
                'tarif' => 10000,
            ],
            [
                'uuid' => Str::uuid(),
                'layanan_id' => $airLimbah->id,
                'nama_pengujian' => 'Suhu',
                'jenis_parameter' => 'Parameter Fisika',
                'satuan' => '°C',
                'baku_mutu' => 'deviasi 3°C',
                'metode' => 'SNI',
                'acuan_metoda_pengujian' => 'SNI 06-6989-24-2005',
                'tarif' => 10000,
            ],
            [
                'uuid' => Str::uuid(),
                'layanan_id' => $airLimbah->id,
                'nama_pengujian' => 'Daya Hantar Listrik',
                'jenis_parameter' => 'Parameter Kimia',
                'satuan' => 'µS/cm',
                'baku_mutu' => '20-350',
                'metode' => 'SNI',
                'acuan_metoda_pengujian' => 'SNI 6989.1-2019',
                'tarif' => 13750,
            ],
            [

                'uuid' => Str::uuid(),
                'layanan_id' => $airLimbah->id,
                'nama_pengujian' => 'BODs',
                'jenis_parameter' => 'Parameter Kimia',
                'satuan' => 'mg/L',
                'baku_mutu' => '30',
                'metode' => 'SNI',
                'acuan_metoda_pengujian' => 'SNI 6989.72-2009',
                'tarif' => 241000,
            ],
            [
                'uuid' => Str::uuid(),
                'layanan_id' => $airLimbah->id,
                'nama_pengujian' => 'COD',
                'jenis_parameter' => 'Parameter Kimia',
                'satuan' => 'mg/L',
                'baku_mutu' => '100',
                'metode' => 'SNI',
                'acuan_metoda_pengujian' => 'SNI 6989.73-2009',
                'tarif' => 102200,
            ],
            [
                'uuid' => Str::uuid(),
                'layanan_id' => $airLimbah->id,
                'nama_pengujian' => 'Amoniak (NH3)N',
                'jenis_parameter' => 'Parameter Kimia',
                'satuan' => 'mg N/L',
                'baku_mutu' => '10',
                'metode' => 'Spektrofometri',
                'acuan_metoda_pengujian' => 'SNI 06-6989.30-2005',
                'tarif' => 37000,
            ],
            [
                'uuid' => Str::uuid(),
                'layanan_id' => $airLimbah->id,
                'nama_pengujian' => 'TSS',
                'jenis_parameter' => 'Parameter Kimia',
                'satuan' => 'mg/L',
                'baku_mutu' => '30',
                'metode' => 'SNI',
                'acuan_metoda_pengujian' => 'SNI 06-6989.3-2004',
                'tarif' => 42500,
            ],
            [
                'uuid' => Str::uuid(),
                'layanan_id' => $airLimbah->id,
                'nama_pengujian' => 'Total Coliform',
                'jenis_parameter' => 'Parameter Mikrobiologi',
                'satuan' => 'MPN/100 mL',
                'baku_mutu' => '50',
                'metode' => 'APHA',
                'acuan_metoda_pengujian' => 'APHA AWWA 9221 B-2017',
                'tarif' => 50000,
            ],

        ];
        $pengujianAirHigiene = [
            [
                'uuid' => Str::uuid(),
                'layanan_id' => $airHigiene->id,
                'nama_pengujian' => 'pH',
                'jenis_parameter' => 'Parameter Kimia',
                'satuan' => '-',
                'baku_mutu' => '6-9',
                'metode' => 'SNI',
                'acuan_metoda_pengujian' => 'SNI 06-6989.11-2004',
                'tarif' => 10000,
            ],
            [
                'uuid' => Str::uuid(),
                'layanan_id' => $airHigiene->id,
                'nama_pengujian' => 'Suhu',
                'jenis_parameter' => 'Parameter Fisika',
                'satuan' => '°C',
                'baku_mutu' => 'deviasi 3°C',
                'metode' => 'SNI',
                'acuan_metoda_pengujian' => 'SNI 06-6989-24-2005',
                'tarif' => 10000,
            ],
            [
                'uuid' => Str::uuid(),
                'layanan_id' => $airHigiene->id,
                'nama_pengujian' => 'Daya Hantar Listrik',
                'jenis_parameter' => 'Parameter Kimia',
                'satuan' => 'µS/cm',
                'baku_mutu' => '20-350',
                'metode' => 'SNI',
                'acuan_metoda_pengujian' => 'SNI 6989.1-2019',
                'tarif' => 13750,
            ],
            [
                'uuid' => Str::uuid(),
                'layanan_id' => $airHigiene->id,
                'nama_pengujian' => 'Kekeruhan',
                'jenis_parameter' => 'Parameter Fisika',
                'satuan' => 'NTU',
                'baku_mutu' => '5',
                'metode' => 'Turbidimetri',
                'acuan_metoda_pengujian' => 'SNI 06-6989.25-2005',
                'tarif' => 10000,
            ],
            [
                'uuid' => Str::uuid(),
                'layanan_id' => $airHigiene->id,
                'nama_pengujian' => 'Surfaktan',
                'jenis_parameter' => 'Parameter Kimia',
                'satuan' => 'mg/L',
                'baku_mutu' => '0.05',
                'metode' => 'SNI',
                'acuan_metoda_pengujian' => 'SNI 6989-51-2005',
                'tarif' => 37000,
            ],
            [
                'uuid' => Str::uuid(),
                'layanan_id' => $airHigiene->id,
                'nama_pengujian' => 'Permanganat',
                'jenis_parameter' => 'Parameter Kimia',
                'satuan' => 'mg/L',
                'baku_mutu' => '10',
                'metode' => 'SNI',
                'acuan_metoda_pengujian' => 'SNI 6989-22-2004',
                'tarif' => 20000,
            ],
            [
                'uuid' => Str::uuid(),
                'layanan_id' => $airHigiene->id,
                'nama_pengujian' => 'TDS',
                'jenis_parameter' => 'Parameter Fisika',
                'satuan' => 'mg/L',
                'baku_mutu' => '1000',
                'metode' => 'APHA',
                'acuan_metoda_pengujian' => 'APHA AWWA 2540 C-2017',
                'tarif' => 38500,
            ],
            [
                'uuid' => Str::uuid(),
                'layanan_id' => $airHigiene->id,
                'nama_pengujian' => 'E - Coliform',
                'jenis_parameter' => 'Parameter Mikrobiologi',
                'satuan' => 'MPN/100 mL',
                'baku_mutu' => '0',
                'metode' => 'APHA',
                'acuan_metoda_pengujian' => 'APHA AWWA 9221 F-2017',
                'tarif' => 50000,
            ],
        ];
        $pengujianAirPermukaan = [
            [
                'uuid' => Str::uuid(),
                'layanan_id' => $airPermukaan->id,
                'nama_pengujian' => 'pH',
                'jenis_parameter' => 'Parameter Kimia',
                'satuan' => '-',
                'baku_mutu' => '6-9',
                'metode' => 'SNI',
                'acuan_metoda_pengujian' => 'SNI 06-6989.11-2004',
                'tarif' => 10000,
            ],
            [
                'uuid' => Str::uuid(),
                'layanan_id' => $airPermukaan->id,
                'nama_pengujian' => 'Oksigen Terlarut (DO)',
                'jenis_parameter' => 'Parameter Kimia',
                'satuan' => 'mg/L',
                'baku_mutu' => '7',
                'metode' => 'SNI',
                'acuan_metoda_pengujian' => 'SNI 06-6989.14-2004',
                'tarif' => 10000,
            ],
            [
                'uuid' => Str::uuid(),
                'layanan_id' => $airPermukaan->id,
                'nama_pengujian' => 'BODs',
                'jenis_parameter' => 'Parameter Kimia',
                'satuan' => 'mg/L',
                'baku_mutu' => '30',
                'metode' => 'SNI',
                'acuan_metoda_pengujian' => 'SNI 6989.72-2009',
                'tarif' => 241000,
            ],
            [
                'uuid' => Str::uuid(),
                'layanan_id' => $airPermukaan->id,
                'nama_pengujian' => 'COD',
                'jenis_parameter' => 'Parameter Kimia',
                'satuan' => 'mg/L',
                'baku_mutu' => '100',
                'metode' => 'SNI',
                'acuan_metoda_pengujian' => 'SNI 6989.73-2009',
                'tarif' => 102200,
            ],
            [
                'uuid' => Str::uuid(),
                'layanan_id' => $airPermukaan->id,
                'nama_pengujian' => 'Nitrat',
                'jenis_parameter' => 'Parameter Kimia',
                'satuan' => 'mg/L',
                'baku_mutu' => '0.08',
                'metode' => 'Spektrofotometri',
                'acuan_metoda_pengujian' => 'SNI 06-6989.9-2004',
                'tarif' => 37000,
            ],
            [
                'uuid' => Str::uuid(),
                'layanan_id' => $airPermukaan->id,
                'nama_pengujian' => 'TSS',
                'jenis_parameter' => 'Parameter Kimia',
                'satuan' => 'mg/L',
                'baku_mutu' => '30',
                'metode' => 'SNI',
                'acuan_metoda_pengujian' => 'SNI 06-6989.3-2004',
                'tarif' => 42500,
            ],
            [
                'uuid' => Str::uuid(),
                'layanan_id' => $airPermukaan->id,
                'nama_pengujian' => 'Fecal Coliform',
                'jenis_parameter' => 'Parameter Mikrobiologi',
                'satuan' => 'MPN/100 mL',
                'baku_mutu' => '50',
                'metode' => 'APHA',
                'acuan_metoda_pengujian' => 'APHA AWWA 9221 C-2018',
                'tarif' => 50000,
            ],
        ];

        $pengujianUdaraAmbien = [
            [
                'uuid' => Str::uuid(),
                'layanan_id' => $udaraAmbien->id,
                'nama_pengujian' => 'Amonia (NH3)',
                'jenis_parameter' => 'Parameter Uji Udara Ambien',
                'satuan' => 'µg/Nm3',
                'baku_mutu' => '400',
                'metode' => 'SNI',
                'acuan_metoda_pengujian' => 'SNI 19-7119.1-2005',
                'tarif' => 250000,
            ],
            [
                'uuid' => Str::uuid(),
                'layanan_id' => $udaraAmbien->id,
                'nama_pengujian' => 'Karbon Monoksida (CO)',
                'jenis_parameter' => 'Parameter Uji Udara Ambien',
                'satuan' => 'µg/Nm3',
                'baku_mutu' => '10.000',
                'metode' => 'SNI',
                'acuan_metoda_pengujian' => 'SNI 7119.10-2011',
                'tarif' => 230000,
            ],

            [
                'uuid' => Str::uuid(),
                'layanan_id' => $udaraAmbien->id,
                'nama_pengujian' => 'Nitrogen Dioksida (NO2)',
                'jenis_parameter' => 'Parameter Uji Udara Ambien',
                'satuan' => 'µg/Nm3',
                'baku_mutu' => '150',
                'metode' => 'SNI',
                'acuan_metoda_pengujian' => 'SNI 19-7119.2-2005',
                'tarif' => 150000,
            ],
            [
                'uuid' => Str::uuid(),
                'layanan_id' => $udaraAmbien->id,
                'nama_pengujian' => 'Total Partikulat (TSP)',
                'jenis_parameter' => 'Parameter Uji Udara Ambien',
                'satuan' => 'µg/Nm3',
                'baku_mutu' => '230',
                'metode' => 'SNI',
                'acuan_metoda_pengujian' => 'SNI 19-7119.3-2005',
                'tarif' => 187000,
            ],
            [
                'uuid' => Str::uuid(),
                'layanan_id' => $udaraAmbien->id,
                'nama_pengujian' => 'Kecepatan Angin',
                'jenis_parameter' => 'Parameter Uji Udara Ambien',
                'satuan' => 'Knot',
                'baku_mutu' => null,
                'metode' => 'SNI',
                'acuan_metoda_pengujian' => 'SNI 19-7119.6-2005',
                'tarif' => 150000,
            ],
            [
                'uuid' => Str::uuid(),
                'layanan_id' => $udaraAmbien->id,
                'nama_pengujian' => 'Temperatur & Kelembapan',
                'jenis_parameter' => 'Parameter Uji Udara Ambien',
                'satuan' => 'Gr/m3',
                'baku_mutu' => null,
                'metode' => 'SNI',
                'acuan_metoda_pengujian' => 'SNI 19-7119.6-2005',
                'tarif' => 70000,
            ],
        ];
        foreach ($pengujianAirLimbah as $al) {
            Pengujian::create($al);
        }
        foreach ($pengujianAirHigiene as $ah) {
            Pengujian::create($ah);
        }
        foreach ($pengujianAirPermukaan as $ap) {
            Pengujian::create($ap);
        }
        foreach ($pengujianUdaraAmbien as $ua) {
            Pengujian::create($ua);
        }
    }
}