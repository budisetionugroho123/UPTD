<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Pesanan;
use App\Models\StatusPesanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class ShuController extends Controller
{
    //
    public function index()
    {
        $this->authorize('kepala_lab');
        $orderModel = Pesanan::where('status_pesanan', 'proses_pengesahan_shu')->get();
        // dd($orderModel);
        $orders = $this->mappingPesanan($orderModel);
        // dd($orders);
        return view('shu.shu-invalid', [
            'title' => 'Daftar SHU',
            'orders' => $orders,
            // 'listPerusahaan' => $listNamaPerusahaan,
            // 'listLayanan' => $listLayanan,
            // 'listStatus' => $listStatus,
        ]);
    }
    public function detail($id)
    {
        $this->authorize('kepala_lab');

        $orders = DB::table('pesanan')
            ->select('analisis.*', 'pengujian.baku_mutu')
            ->join('analisis', 'analisis.pesanan_id', '=', 'pesanan.id')
            ->join('pengujian', 'pengujian.id', '=', 'analisis.pengujian_id')
            ->where('pesanan.id', $id)
            ->get();


        $order = Pesanan::with('layanan')->find($id);
        $statusPesanan = StatusPesanan::where('status', $order->status_pesanan)->first()->label;
        // dd($order);
        // dd($orders);
        return view('shu.detail-shu', [
            'title' => 'Detail Pesanan',
            'orders' => $orders,
            'order' => $order,
            'statusPesanan' => $statusPesanan
        ]);
    }
    public function generateShu($id)
    {
        // $this->authorize('kepala_lab');

        $orders = DB::table('pesanan')
            ->select('analisis.*', 'pengujian.baku_mutu', 'pengujian.acuan_metoda_pengujian')
            ->join('analisis', 'analisis.pesanan_id', '=', 'pesanan.id')
            ->join('pengujian', 'pengujian.id', '=', 'analisis.pengujian_id')
            ->where('pesanan.id', $id)
            ->get();


        $order = Pesanan::with('layanan')->find($id);
        $data = [
            'order' => $order,
            'analisis' => $orders,
            'ttd' => User::where('role', 'manager_teknis')->first()->ttd,
            'managerTeknis' => User::where('role', 'manager_teknis')->first()->name
        ];
        $customPaper = array(0, 0, 583.93,  926.00);


        $pdf = PDF::loadView('shu.pdf', $data)->setPaper($customPaper, 'portrait');
        $pdf->getDomPDF()->setHttpContext(
            stream_context_create([
                'ssl' => [
                    'allow_self_signed' => TRUE,
                    'verify_peer' => FALSE,
                    'verify_peer_name' => FALSE,
                ]
            ])
        );
        // $pdf = PDF::loadView('shu.pdf', $data)->setPaper('a4', 'landscape');
        return $pdf->download('itsolutionstuff.pdf');
    }
    public function validasiShu($id)
    {
        $pesanan = Pesanan::find($id);
        $pesanan->status_pesanan = "pengesahan_shu_selesai";
        $pesanan->update();

        return redirect()->route('list.shu')->with('toast_success', 'Mengesahkan Shu Berhasil, pesanan selesai');
    }
    public function mappingPesanan($orderModel)
    {
        $orders = [];
        foreach ($orderModel as $order) {
            $orders[] = [
                'id' => $order->id,
                'nama_perusahaan' => $order->nama_perusahaan,
                'alamat_perusahaan' => $order->alamat_perusahaan,
                'telephone' => $order->telephone,
                'nama_pic' => $order->nama_pic,
                'no_pic' => $order->no_pic,
                'email_pic' => $order->email_pic,
                'nama_layanan' => [
                    'id' => $order->layanan_id,
                    'label' => Layanan::find($order->layanan_id)->nama_layanan
                ],
                'jenis_layanan' => $order->jenis_layanan ==  "datang_ke_lokasi" ? "Datang Ke Lokasi" : "Datang Ke Laboratorium",
                'status_pesanan' => [
                    'id' => $order->status_pesanan,
                    'label' => StatusPesanan::where('status', $order->status_pesanan)->first()->label
                ],
                'tanggal_pengantaran' => $order->tanggal_pengantaran,
                'identitas_sampel' => $order->identitas_sampel,
                'tanggal_pengambilan' => $order->tanggal_pengambilan,
                'alamat_pengambilan_sampel' => $order->alamat_pengambilan_sampel,
                'volume_uji_coba' => $order->volume_uji_coba,
                'total_harga' => $order->total_harga,
                'status_pembayaran' => $order->is_paid == 1 ? "Sudah Membayar" : "Belum Membayar",

            ];
        }
        return $orders;
    }
}
