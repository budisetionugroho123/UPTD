<?php

namespace App\Http\Controllers;

use App\Models\Analisis;
use App\Models\Layanan;
use App\Models\Pesanan;
use App\Models\StatusPesanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnalisisController extends Controller
{
    //
    public function index()
    {

        $this->authorize('pengujian');

        $orders = [];
        $listNamaPerusahaan = DB::table('pesanan')->distinct()->get(['nama_perusahaan']);
        $listLayanan = Layanan::get(['id', 'nama_layanan']);
        $listStatus = StatusPesanan::all();

        $orderModel = Pesanan::where('status_pesanan', 'sudah_konfirmasi')->where('is_paid', 1)->get();
        // dd($orderModel);
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
                'tanggal_pengambilan' => $order->tanggal_pengambilan,
                'alamat_pengambilan_sampel' => $order->alamat_pengambilan_sampel,
                'volume_uji_coba' => $order->volume_uji_coba,
                'total_harga' => $order->total_harga,
                'status_pembayaran' => $order->is_paid == 1 ? "Sudah Membayar" : "Belum Membayar",

            ];
        }
        // dd($orders);
        return view('analisis.index', [
            'title' => 'Pengujian Pesanan',
            'orders' => $orders,
            'listPerusahaan' => $listNamaPerusahaan,
            'listLayanan' => $listLayanan,
            'listStatus' => $listStatus,
        ]);
    }
    public function progressAnalisis($id)
    {
        $this->authorize('pesanan');

        $listAnalisa = Analisis::where('pesanan_id', $id)->with('user')->get();

        $listPenguji = User::where('role', 'analisis_lab')->get();

        // dd($pesanan);
        return view('analisis.progres-analisis', [
            'title' => 'Tugas Penguji',
            'daftarPenguji' => $listPenguji,
            'listAnalisa' => $listAnalisa,
            'idPesanan' => $id
        ]);
    }
    public function assignPenguji(Request $request)
    {
        $this->authorize('pesanan');

        foreach ($request->except('_token', 'pesanan_id') as $penguji) {
            $analisis = Analisis::find($penguji[0]);
            if ($penguji[1] == "") {
                $analisis->id_penguji = null;
            } else {
                $analisis->id_penguji = $penguji[1];
                $analisis->status = "Menunggu Pengujian";
            }
            $analisis->update();
        }
        return back()->with('success', 'Berhasil menetapkan penguji');
    }
    public function konfirmasiProsesAnalisa($id)
    {
        $this->authorize('pengujian');
        // dd($id);
        $listAnalisa = Pesanan::with('analisis')->find($id)->analisis;
        foreach ($listAnalisa as $analisa) {
            if (is_null($analisa->id_penguji)) {
                return back()->with('error', 'Harap tentukan penguji terhadap paramater pesanan');
            }
        }
        $pesanan = Pesanan::find($id);
        $pesanan->status_pesanan = 'proses_analisis';
        $pesanan->update();
        return redirect()->route('analisis.index')->with('success', 'Pesanan berhasil masuk ke tahap proses analisis');
        // foreach ( )
    }

    public function prosesAnalisis()
    {
        $this->authorize('input-hasil-pengujian');

        $orders = [];
        // $listNamaPerusahaan = DB::table('pesanan')->distinct()->get(['nama_perusahaan']);
        // $listLayanan = Layanan::get(['id', 'nama_layanan']);
        // $listStatus = StatusPesanan::all();

        $orderModel = Pesanan::where('status_pesanan', 'proses_analisis')->get();

        // dd($orderModel);
        foreach ($orderModel as $order) {
            $orders[] = [
                'id' => $order->id,
                'nama_perusahaan' => $order->nama_perusahaan,
                'alamat_perusahaan' => $order->alamat_perusahaan,
                'telephone' => $order->telephone,
                'nama_pic' => $order->nama_pic,
                'no_pic' => $order->no_pic,
                'email_pic' => $order->email_pic,
                'identitas_sampel' => $order->identitas_sampel,
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
                'tanggal_pengambilan' => $order->tanggal_pengambilan,
                'alamat_pengambilan_sampel' => $order->alamat_pengambilan_sampel,
                'volume_uji_coba' => $order->volume_uji_coba,
                'total_harga' => $order->total_harga,
                'status_pembayaran' => $order->is_paid == 1 ? "Sudah Membayar" : "Belum Membayar",

            ];
        }
        // dd($orders);
        return view('analisis.proses-analisis.index', [
            'title' => 'Daftar Proses Analisis ',
            'orders' => $orders,
            // 'listPerusahaan' => $listNamaPerusahaan,
            // 'listLayanan' => $listLayanan,
            // 'listStatus' => $listStatus,
        ]);
    }

    public function inputAnalisis($id)
    {
        $this->authorize('input-hasil-pengujian');
        // dd(auth()->user()->role);
        if (auth()->user()->role == "manager_teknis") {
            $orders = DB::table('pesanan')
                ->select('analisis.*', 'pengujian.baku_mutu')
                ->join('analisis', 'analisis.pesanan_id', '=', 'pesanan.id')
                ->join('pengujian', 'pengujian.id', '=', 'analisis.pengujian_id')
                ->where('pesanan.id', $id)
                ->get();
        } else {
            $orders = DB::table('pesanan')
                ->select('analisis.*', 'pengujian.baku_mutu')
                ->join('analisis', 'analisis.pesanan_id', '=', 'pesanan.id')
                ->join('pengujian', 'pengujian.id', '=', 'analisis.pengujian_id')
                ->where('analisis.id_penguji', auth()->user()->id)
                ->where('pesanan.id', $id)
                ->get();
        }
        $order = Pesanan::with('layanan')->find($id);
        // dd($order);
        // dd($orders);
        return view('analisis.proses-analisis.input-analisis', [
            'title' => 'Input Hasil Analisis',
            'orders' => $orders,
            'order' => $order

        ]);
    }


    public function storeInputAnalisis(Request $request)
    {
        foreach ($request->except('_token', 'pesanan_id') as $analisis) {
            if (count($analisis) > 1) {
                $dataAnalis = Analisis::find($analisis[2]);
                // if ($dataAnalis->status == "Menunggu Validasi" || $dataAnalis->status == "Valid") {
                //     continue;
                // }
                $dataAnalis->hasi_uji = $analisis[0];
                $dataAnalis->keterangan = $analisis[1];
                if ($dataAnalis->hasi_uji != null && $dataAnalis->keterangan != null) {
                    $dataAnalis->status = "Menunggu Validasi";
                }
                $dataAnalis->update();
            }
        }
        return back()->with('success', 'Berhasil input hasil analis');
    }
    public function listHasilAnalisis()
    {
        $this->authorize('input-hasil-pengujian');

        $orders = [];
        // $listNamaPerusahaan = DB::table('pesanan')->distinct()->get(['nama_perusahaan']);
        // $listLayanan = Layanan::get(['id', 'nama_layanan']);
        // $listStatus = StatusPesanan::all();

        $orderModel = Pesanan::where('status_pesanan', 'proses_analisis')->get();

        // dd($orderModel);
        foreach ($orderModel as $order) {
            $orders[] = [
                'id' => $order->id,
                'nama_perusahaan' => $order->nama_perusahaan,
                'alamat_perusahaan' => $order->alamat_perusahaan,
                'telephone' => $order->telephone,
                'nama_pic' => $order->nama_pic,
                'no_pic' => $order->no_pic,
                'email_pic' => $order->email_pic,
                'identitas_sampel' => $order->identitas_sampel,
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
                'tanggal_pengambilan' => $order->tanggal_pengambilan,
                'alamat_pengambilan_sampel' => $order->alamat_pengambilan_sampel,
                'volume_uji_coba' => $order->volume_uji_coba,
                'total_harga' => $order->total_harga,
                'status_pembayaran' => $order->is_paid == 1 ? "Sudah Membayar" : "Belum Membayar",

            ];
        }
        // dd($orders);
        return view('analisis.hasil-analisis.index', [
            'title' => 'Daftar Hasil Analisis ',
            'orders' => $orders,
        ]);
    }
    public function detailHasilAnalisis($id)
    {
        $this->authorize('input-hasil-pengujian');
        // dd(auth()->user()->role);
        if (auth()->user()->role == "manager_teknis") {
            $orders = DB::table('pesanan')
                ->select('analisis.*', 'pengujian.baku_mutu')
                ->join('analisis', 'analisis.pesanan_id', '=', 'pesanan.id')
                ->join('pengujian', 'pengujian.id', '=', 'analisis.pengujian_id')
                ->where('pesanan.id', $id)
                ->get();
        } else {
            $orders = DB::table('pesanan')
                ->select('analisis.*', 'pengujian.baku_mutu')
                ->join('analisis', 'analisis.pesanan_id', '=', 'pesanan.id')
                ->join('pengujian', 'pengujian.id', '=', 'analisis.pengujian_id')
                ->where('analisis.id_penguji', auth()->user()->id)
                ->where('pesanan.id', $id)
                ->get();
        }
        $order = Pesanan::with('layanan')->find($id);
        // dd($order);
        // dd($orders);
        return view('analisis.hasil-analisis.detail-hasil-analisis', [
            'title' => 'Validasi Hasil Analisis',
            'orders' => $orders,
            'order' => $order

        ]);
    }
    public function validasiHasilAnalisis(Request $request)
    {
        foreach ($request->except('_token', 'pesanan_id') as $key => $value) {
            $analisis = Analisis::find($key);
            if ($value != null) {
                // dd($analisis);
                $analisis->status = $value;
                $analisis->update();
            }
        }
        return back()->with('toast_success', 'Berhasil validasi beberapa data analisis');
    }
    public function konfirmasiLolosValidasi($id)
    {
        $this->authorize('pengujian');
        // dd($id);
        $listAnalisa = Pesanan::with('analisis')->find($id)->analisis;
        foreach ($listAnalisa as $analisa) {
            if (is_null($analisa->id_penguji)) {
                return back()->with('error', 'Harap tentukan penguji terhadap paramater pesanan');
            }
        }
        $pesanan = Pesanan::find($id);
        $pesanan->status_pesanan = 'proses_analisis';
        $pesanan->update();
        return redirect()->route('analisis.index')->with('success', 'Pesanan berhasil masuk ke tahap proses analisis');
        // foreach ( )
    }
    public function lolosValidasi($id)
    {
        $checkParameter = Analisis::where('pesanan_id', $id)->where('status', '!=', 'Valid')->count();
        if ($checkParameter > 0) {
            return back()->with('toast_error', 'Masih terdapat pengujian yang belum valid');
        }
        $pesanan = Pesanan::find($id);
        $pesanan->status_pesanan =  "proses_pengesahan_shu";
        $pesanan->update();

        return redirect()->route('hasil.analisis')->with('toast_success', 'Berhasil validasi data analisis pesanan');
    }
}