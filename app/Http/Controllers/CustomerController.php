<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Pesanan;
use App\Models\StatusPesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    //
    public function dataPesanan()
    {
        $this->authorize('customer');
        $orders = Pesanan::where('user_id', auth()->user()->id)->get();
        $mappingOrders = [];
        foreach ($orders as $order) {
            $mappingOrders[] = [
                'id' => $order->id,
                'nama_perusahaan' => $order->nama_perusahaan,
                'jenis_layanan' => $order->jenis_layanan == "datang_ke_lokasi" ? "Petugas Datang Ke Lokasi" : "Pelanggan datang ke Laboratorium",
                'nama_layanan' => Layanan::find($order->layanan_id)->nama_layanan,
                'jenis_sampel' => Layanan::find($order->layanan_id)->jenis_sampel,
                'status_pesanan' => StatusPesanan::where('status', $order->status_pesanan)->first()->label,
                'status_pembayaran' => $order->is_paid == 1 ? "Sudah Bayar" : "Belum Bayar"
            ];
        }
        return view('home-landing.customer.pesanan', [
            'orders' => $mappingOrders
        ]);
    }
    public function pesananDetail($id)
    {
        $orders = DB::table('pesanan')
            ->select('analisis.*', 'pengujian.baku_mutu')
            ->join('analisis', 'analisis.pesanan_id', '=', 'pesanan.id')
            ->join('pengujian', 'pengujian.id', '=', 'analisis.pengujian_id')
            ->where('pesanan.id', $id)
            ->get();


        $order = Pesanan::with('layanan')->find($id);
        $statusPesanan = StatusPesanan::where('status', $order->status_pesanan)->first()->label;

        return view('home-landing.customer.pesanan-detail', [
            'orders' => $orders,
            'order' => $order,
            'statusPesanan' => $statusPesanan
        ]);
    }
}
