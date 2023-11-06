<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Pengujian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {

        $airLimbah = DB::table('layanan')
            ->select("layanan.id as layanan_id", 'layanan.jenis_sampel', 'layanan.nama_layanan', 'pengujian.nama_pengujian', 'pengujian.satuan', 'pengujian.metode', 'pengujian.tarif')
            ->leftJoin('pengujian', 'pengujian.layanan_id', '=', 'layanan.id')
            ->where('layanan.kode_sampel', 'air_limbah')
            ->get();

        $airHigiene = DB::table('layanan')
            ->select("layanan.id as layanan_id", 'layanan.jenis_sampel', 'layanan.nama_layanan', 'pengujian.nama_pengujian', 'pengujian.satuan', 'pengujian.metode', 'pengujian.tarif')
            ->leftJoin('pengujian', 'pengujian.layanan_id', '=', 'layanan.id')
            ->where('layanan.kode_sampel', 'air_higiene_dan_sanitasi')
            ->get();

        $airPermukaan = DB::table('layanan')
            ->select("layanan.id as layanan_id", 'layanan.jenis_sampel', 'layanan.nama_layanan', 'pengujian.nama_pengujian', 'pengujian.satuan', 'pengujian.metode', 'pengujian.tarif')
            ->leftJoin('pengujian', 'pengujian.layanan_id', '=', 'layanan.id')
            ->where('layanan.kode_sampel', 'air_permukaan')
            ->get();

        $udaraAmbien = DB::table('layanan')
            ->select("layanan.id as layanan_id", 'layanan.jenis_sampel', 'layanan.nama_layanan', 'pengujian.nama_pengujian', 'pengujian.satuan', 'pengujian.metode', 'pengujian.tarif')
            ->leftJoin('pengujian', 'pengujian.layanan_id', '=', 'layanan.id')
            ->where('layanan.kode_sampel', 'udara_ambien')
            ->get();


        $satuanParameter = DB::table('pengujian')->select('nama_pengujian', 'satuan', 'jenis_parameter', 'metode', 'tarif')->distinct()->get();

        $parameterFisika = [];
        $parameterKimia = [];
        $parameterMikrobiologi = [];
        $parameterUdara = [];
        // dd($satuanParameter);
        foreach ($satuanParameter as $satuan) {
            if ($satuan->jenis_parameter == 'Parameter Fisika') {
                $parameterFisika[] = [
                    'nama_pengujian' => $satuan->nama_pengujian,
                    'satuan' => $satuan->satuan,
                    'metode' => $satuan->metode,
                    'tarif' => $satuan->tarif
                ];
            } else if ($satuan->jenis_parameter == 'Parameter Kimia') {
                $parameterKimia[] = [
                    'nama_pengujian' => $satuan->nama_pengujian,
                    'satuan' => $satuan->satuan,
                    'metode' => $satuan->metode,
                    'tarif' => $satuan->tarif
                ];
            } else if ($satuan->jenis_parameter == 'Parameter Mikrobiologi') {
                $parameterMikrobiologi[] = [
                    'nama_pengujian' => $satuan->nama_pengujian,
                    'satuan' => $satuan->satuan,
                    'metode' => $satuan->metode,
                    'tarif' => $satuan->tarif
                ];
            } else if ($satuan->jenis_parameter == 'Parameter Uji Udara Ambien') {
                $parameterUdara[] = [
                    'nama_pengujian' => $satuan->nama_pengujian,
                    'satuan' => $satuan->satuan,
                    'metode' => $satuan->metode,
                    'tarif' => $satuan->tarif
                ];
            }
        }
        return view('home-landing.index', compact('airLimbah', 'airHigiene', 'airPermukaan', 'udaraAmbien', 'parameterKimia', 'parameterFisika', 'parameterMikrobiologi', 'parameterUdara'));
    }
    public function about()
    {
        return view('home-landing.about');
    }
    public function orderLayananAirLimbah()
    {
        return view('home-landing.order-layanan.air-limbah', [
            'title' => 'UJI KUALITAS AIR LIMBAH'
        ]);
    }
    public function orderLayananAirHigiene()
    {
        return view('home-landing.order-layanan.air-higiene', [
            'title' => 'UJI KUALITAS AIR HIGIENE & SANITASI'
        ]);
    }
    public function orderLayananAirPermukaan()
    {
        return view('home-landing.order-layanan.air-permukaan', [
            'title' => 'UJI KUALITAS AIR PERMUKAAN'

        ]);
    }
    public function orderLayananUdaraAmbien()
    {
        return view('home-landing.order-layanan.udara-ambien', [
            'title' => 'UJI KUALITAS UDARA AMBIEN'

        ]);
    }
    public function orderLayanan()
    {
        return view('home-landing.order-layanan.order', [
            'title' => 'ORDER LAYANAN'

        ]);
    }
    public function sertifikat()
    {
        // dd("test");
        return view('home-landing.sertifikat', [
            'title' => 'Sertifikat'
        ]);
    }
}
