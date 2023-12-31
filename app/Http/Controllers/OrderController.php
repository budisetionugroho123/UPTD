<?php

namespace App\Http\Controllers;

use App\Models\Analisis;
use App\Models\Pengujian;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Alert;
use App\Models\Layanan;
use App\Models\StatusPesanan;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    //

    public function index(Request $request)
    {
        $this->authorize('pesanan');
        $listNamaPerusahaan = DB::table('pesanan')->distinct()->get(['nama_perusahaan']);
        $listLayanan = Layanan::get(['id', 'nama_layanan']);
        $params = $request->all();
        if (isset($params) && !empty($params)) {

            if (!empty($params['nama_layanan']) && !empty($params['nama_perusahaan'])) {
                $orderModel = Pesanan::where('layanan_id', $params['nama_layanan'])->whereNotIn('status_pesanan', ['pengesahan_shu_selesai', 'pesanan_dibatalkan'])->where('nama_perusahaan', $params['nama_perusahaan'])->get();
            } else if (!empty($params['nama_layanan']) && empty($params['nama_perusahaan'])) {
                $orderModel = Pesanan::where('layanan_id', $params['nama_layanan'])->whereNotIn('status_pesanan', ['pengesahan_shu_selesai', 'pesanan_dibatalkan'])->get();
            } else if (empty($params['nama_layanan']) && !empty($params['nama_perusahaan'])) {
                $orderModel = Pesanan::where('nama_perusahaan', $params['nama_perusahaan'])->whereNotIn('status_pesanan', ['pengesahan_shu_selesai', 'pesanan_dibatalkan'])->get();
            } else {
                $orderModel = Pesanan::whereNotIn('status_pesanan', ['pengesahan_shu_selesai', 'pesanan_dibatalkan'])->get();
            }
        } else {
            $orderModel = Pesanan::whereNotIn('status_pesanan', ['pengesahan_shu_selesai', 'pesanan_dibatalkan'])->get();
        }
        // dd($orderModel);
        $orders = $this->mappingPesanan($orderModel);

        // dd($orders);
        return view('pesanan-admin.index', [
            'title' => 'Daftar Pesanan',
            'orders' => $orders,
            'listPerusahaan' => $listNamaPerusahaan,
            'listLayanan' => $listLayanan,
        ]);
    }
    public function detail($id)
    {
        $this->authorize('pesanan');
        // dd($id);
        $pesanan = Pesanan::with('layanan')->find($id);
        $listAnalisa = Analisis::where('pesanan_id', $id)->with('user')->get();
        $pesanan->label_status = StatusPesanan::where('status', $pesanan->status_pesanan)->first()->label;
        $listPenguji = User::where('role', 'analisis_lab')->get();


        $orders = DB::table('pesanan')
            ->select('analisis.*', 'pengujian.baku_mutu')
            ->join('analisis', 'analisis.pesanan_id', '=', 'pesanan.id')
            ->join('pengujian', 'pengujian.id', '=', 'analisis.pengujian_id')
            ->where('pesanan.id', $id)
            ->get();


        $statusPesanan = StatusPesanan::where('status', $pesanan->status_pesanan)->first()->label;
        // dd($pesanan);
        return view('pesanan-admin.detail', [
            'title' => 'Detail Pesanan',
            'pesanan' => $pesanan,
            'orders' => $orders,
            'daftarPenguji' => $listPenguji,
            'statusPesanan' => $statusPesanan,
            'listAnalisa' => $listAnalisa
        ]);
    }
    public function orderToLocation()
    {

        return view('home-landing.order-layanan.form-order-lokasi', [
            'title' => 'Petugas kami Datang ke Lokasi',
            'services' => Layanan::where('datang_ke_lokasi', 1)->get()

        ]);
    }
    public function orderToLab()
    {
        return view('home-landing.order-layanan.form-order-lab', [
            'title' => 'Datang ke Laboratorium',
            'services' => Layanan::where('antar_lab', 1)->get()

        ]);
    }
    public function createOrderLab(Request $request)
    {
        // dd($request->input());
        // $this->authorize('customer');
        // dd(auth()->user()->id);
        if (Gate::allows('customer')) {
            $data = [
                'layanan_id' => $request->layanan_id,
                'nama_perusahaan'  => $request->nama_perusahaan,
                'alamat_perusahaan' => $request->alamat_perusahaan,
                'telephone' => $request->telephone,
                'nama_pic' => $request->nama_pic,
                'no_pic' => $request->no_pic,
                'email_pic' => $request->email_pic,
                'jenis_layanan' => 'datang_ke_lab',
                'status_pesanan' => 'belum_konfirmasi',
                'jenis_pesanan' => $request->jenis_pesanan,
                'tanggal_pengantaran' => $request->tanggal_pengantaran,
                'volume_uji_coba' => $request->volume_uji_coba,
                'is_paid' => 0,
                'user_id' => auth()->user()->id
            ];
            if (isset($request->inputSatuan)) {
                $hargaPengujian = Pengujian::whereIn('id', $request->inputSatuan)->sum('tarif');
                $data['total_harga'] = $hargaPengujian;
                // dd($data);
                $pesanan = Pesanan::create($data);
                $identitas = Layanan::find($data['layanan_id'])->identitas_layanan;
                // $time =
                $identitasSampel = "000" . $pesanan->id . "-" . $identitas . "/LL-Tangsel" . "/" . date_format($pesanan->created_at, "m") . "/" . date_format($pesanan->created_at, "Y");
                $updateIdentitas = Pesanan::find($pesanan->id);
                $updateIdentitas->identitas_sampel = $identitasSampel;
                $updateIdentitas->update();

                // create email
                // $this->createEmailCustomer($pesanan);

                $dataPengujian = Pengujian::whereIn('id', $request->inputSatuan)->get();
                // dd($dataPengujian);
                foreach ($dataPengujian as $pengujian) {
                    Analisis::create([
                        'pesanan_id' => $pesanan->id,
                        'pengujian_id' => $pengujian->id,
                        'satuan' => $pengujian->satuan,
                        'nama_pengujian' => $pengujian->nama_pengujian,
                        'status' => 'Menunggu Pengujian',
                    ]);
                }
            } else {
                $hargaPengujian = Pengujian::where('layanan_id', $request->layanan_id)->sum('tarif');
                $data['total_harga'] = $hargaPengujian;
                // dd($data);
                $pesanan = Pesanan::create($data);
                $identitas = Layanan::find($data['layanan_id'])->identitas_layanan;
                // $time =
                $identitasSampel = "000" . $pesanan->id . "-" . $identitas . "/LL-Tangsel" . "/" . date_format($pesanan->created_at, "m") . "/" . date_format($pesanan->created_at, "Y");
                $updateIdentitas = Pesanan::find($pesanan->id);
                $updateIdentitas->identitas_sampel = $identitasSampel;
                $updateIdentitas->update();



                // create email
                $this->createEmailCustomer($pesanan);
                // dd($identitasSampel);


                $dataPengujian = Pengujian::where('layanan_id', $request->layanan_id)->get();
                // dd($dataPengujian);
                foreach ($dataPengujian as $pengujian) {
                    Analisis::create([
                        'pesanan_id' => $pesanan->id,
                        'pengujian_id' => $pengujian->id,
                        'satuan' => $pengujian->satuan,
                        'nama_pengujian' => $pengujian->nama_pengujian,
                        'status' => 'Menunggu Pengujian',
                    ]);
                }
            }
            // toast('Your Post as been submited!', 'success');

            // Alert::success('Hore!', 'Post Created Successfully');
            return redirect()->back()->with('success', "Berhasil membuat permintaan pesanan");
        } else {
            return redirect()->back()->with('error', "Silahkan login dengan akun customer");
        }
    }
    public function createOrderLoc(Request $request)
    {
        // dd($request->input());
        if (Gate::allows('customer')) {

            $data = [
                'layanan_id' => $request->layanan_id,
                'nama_perusahaan'  => $request->nama_perusahaan,
                'alamat_perusahaan' => $request->alamat_perusahaan,
                'telephone' => $request->telephone,
                'nama_pic' => $request->nama_pic,
                'no_pic' => $request->no_pic,
                'email_pic' => $request->email_pic,
                'jenis_layanan' => 'datang_ke_lokasi',
                'status_pesanan' => 'belum_konfirmasi',
                'jenis_pesanan' => $request->jenis_pesanan,
                'tanggal_pengambilan' => $request->tanggal_pengambilan,
                'alamat_pengambilan_sampel' => $request->alamat_pengambilan_sampel,
                'is_paid' => 0,
                'user_id' => auth()->user()->id
            ];
            if (isset($request->inputSatuan)) {
                $hargaPengujian = Pengujian::whereIn('id', $request->inputSatuan)->sum('tarif');
                $data['total_harga'] = $hargaPengujian + 500000;
                // dd($data);
                $pesanan = Pesanan::create($data);
                $identitas = Layanan::find($data['layanan_id'])->identitas_layanan;
                // $time =
                $identitasSampel = "000" . $pesanan->id . "-" . $identitas . "/LL-Tangsel" . "/" . date_format($pesanan->created_at, "m") . "/" . date_format($pesanan->created_at, "Y");
                $updateIdentitas = Pesanan::find($pesanan->id);
                $updateIdentitas->identitas_sampel = $identitasSampel;
                $updateIdentitas->update();

                // create email
                // $this->createEmailCustomer($pesanan);

                $dataPengujian = Pengujian::whereIn('id', $request->inputSatuan)->get();
                // dd($dataPengujian);
                foreach ($dataPengujian as $pengujian) {
                    Analisis::create([
                        'pesanan_id' => $pesanan->id,
                        'pengujian_id' => $pengujian->id,
                        'satuan' => $pengujian->satuan,
                        'nama_pengujian' => $pengujian->nama_pengujian,
                        'status' => 'Menunggu Pengujian',
                    ]);
                }
            } else {
                $hargaPengujian = Pengujian::where('layanan_id', $request->layanan_id)->sum('tarif');
                $data['total_harga'] = $hargaPengujian + 500000;
                // dd($data);
                // dd($data);
                $pesanan = Pesanan::create($data);
                $identitas = Layanan::find($data['layanan_id'])->identitas_layanan;
                // $time =
                $identitasSampel = "000" . $pesanan->id . "-" . $identitas . "/LL-Tangsel" . "/" . date_format($pesanan->created_at, "m") . "/" . date_format($pesanan->created_at, "Y");
                $updateIdentitas = Pesanan::find($pesanan->id);
                $updateIdentitas->identitas_sampel = $identitasSampel;
                $updateIdentitas->update();



                // create email
                // $this->createEmailCustomer($pesanan);
                // dd($identitasSampel);


                $dataPengujian = Pengujian::where('layanan_id', $request->layanan_id)->get();
                // dd($dataPengujian);
                foreach ($dataPengujian as $pengujian) {
                    Analisis::create([
                        'pesanan_id' => $pesanan->id,
                        'pengujian_id' => $pengujian->id,
                        'satuan' => $pengujian->satuan,
                        'nama_pengujian' => $pengujian->nama_pengujian,
                        'status' => 'Menunggu Pengujian',
                    ]);
                }
            }
            // toast('Your Post as been submited!', 'success');

            // Alert::success('Hore!', 'Post Created Successfully');
            return redirect()->back()->with('success', "Berhasil membuat permintaan pesanan");
        } else {
            return redirect()->back()->with('error', "Silahkan login dengan akun customer");
        }
    }

    public function createEmailCustomer($pesanan)
    {
        $user = User::where('email', $pesanan->email_pic)->first();
        // dd($user);
        if (!$user) {
            // dd("tidak ada");
            $dataCustomer = [
                'uuid' => (string)Str::uuid(),
                'name' => $pesanan->nama_pic,
                'email' => $pesanan->email_pic,
                'role' => 'customer',
                'no_hp' => $pesanan->telephone,
                'password' => Hash::make(strtolower(Str::random(10)))
            ];
            User::create($dataCustomer);
        }
    }
    public function konfirmasi($id)
    {
        $this->authorize('pesanan');

        $pesanan = Pesanan::find($id);
        $pesanan->status_pesanan = "sudah_konfirmasi";
        $pesanan->update();
        return redirect()->route('order.index')->with('success', "Pesanan berhasil dikonfirmasi");
    }
    public function konfirmasiPembayaran($id)
    {
        $this->authorize('pesanan');

        $pesanan = Pesanan::find($id);
        if ($pesanan->status_pembayaran == "batal" || $pesanan->status_pesanan == "belum_konfirmasi") {
            return redirect()->route('order.index')->with('error', "Harapa konfirmasi terlebih dahulu");
        }
        $pesanan->is_paid = 1;
        $pesanan->update();
        return redirect()->route('order.index')->with('success', "Pesanan berhasil konfirmasi pembayaran");
    }
    public function batalkanPesanan($id)
    {
        $this->authorize('pesanan');

        $pesanan = Pesanan::find($id);
        $pesanan->status_pesanan = "pesanan_dibatalkan";
        $pesanan->update();
        return redirect()->route('order.index')->with('success', "Pesanan berhasil dikonfirmasi");
    }


    public function orderCompleted(Request $request)
    {
        $this->authorize('pesanan');
        $listNamaPerusahaan = DB::table('pesanan')->distinct()->get(['nama_perusahaan']);
        $listLayanan = Layanan::get(['id', 'nama_layanan']);
        $params = $request->all();
        if (isset($params) && !empty($params)) {

            if (!empty($params['nama_layanan']) && !empty($params['nama_perusahaan'])) {
                $orderModel = Pesanan::where('layanan_id', $params['nama_layanan'])->where('status_pesanan', 'pengesahan_shu_selesai')->where('nama_perusahaan', $params['nama_perusahaan'])->get();
            } else if (!empty($params['nama_layanan']) && empty($params['nama_perusahaan'])) {
                $orderModel = Pesanan::where('layanan_id', $params['nama_layanan'])->where('status_pesanan', 'pengesahan_shu_selesai')->get();
            } else if (empty($params['nama_layanan']) && !empty($params['nama_perusahaan'])) {
                $orderModel = Pesanan::where('nama_perusahaan', $params['nama_perusahaan'])->where('status_pesanan', 'pengesahan_shu_selesai')->get();
            } else {
                $orderModel = Pesanan::where('status_pesanan', 'pengesahan_shu_selesai')->get();
            }
        } else {
            $orderModel = Pesanan::where('status_pesanan', 'pengesahan_shu_selesai')->get();
        }
        // dd($orderModel);
        $orders = $this->mappingPesanan($orderModel);

        return view('pesanan-admin.completed.index', [
            'title' => 'Daftar Pesanan',
            'orders' => $orders,
            'listPerusahaan' => $listNamaPerusahaan,
            'listLayanan' => $listLayanan,
        ]);
    }

    public function orderCompletedDetail($id)
    {
        $this->authorize('pesanan');

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
        return view('pesanan-admin.completed.detail', [
            'title' => 'Detail Pesanan',
            'orders' => $orders,
            'pesanan' => $order,
            'statusPesanan' => $statusPesanan
        ]);
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
    public function orderCancel(Request $request)
    {
        $this->authorize('pesanan');
        $listNamaPerusahaan = DB::table('pesanan')->distinct()->get(['nama_perusahaan']);
        $listLayanan = Layanan::get(['id', 'nama_layanan']);
        $params = $request->all();
        if (isset($params) && !empty($params)) {

            if (!empty($params['nama_layanan']) && !empty($params['nama_perusahaan'])) {
                $orderModel = Pesanan::where('layanan_id', $params['nama_layanan'])->where('status_pesanan', 'pesanan_dibatalkan')->where('nama_perusahaan', $params['nama_perusahaan'])->get();
            } else if (!empty($params['nama_layanan']) && empty($params['nama_perusahaan'])) {
                $orderModel = Pesanan::where('layanan_id', $params['nama_layanan'])->where('status_pesanan', 'pesanan_dibatalkan')->get();
            } else if (empty($params['nama_layanan']) && !empty($params['nama_perusahaan'])) {
                $orderModel = Pesanan::where('nama_perusahaan', $params['nama_perusahaan'])->where('status_pesanan', 'pesanan_dibatalkan')->get();
            } else {
                $orderModel = Pesanan::where('status_pesanan', 'pesanan_dibatalkan')->get();
            }
        } else {
            $orderModel = Pesanan::where('status_pesanan', 'pesanan_dibatalkan')->get();
        }
        // dd($orderModel);
        $orders = $this->mappingPesanan($orderModel);

        return view('pesanan-admin.canceled.index', [
            'title' => 'Daftar Pesanan',
            'orders' => $orders,
            'listPerusahaan' => $listNamaPerusahaan,
            'listLayanan' => $listLayanan,
        ]);
    }

    public function orderCancelDetail($id)
    {
        $this->authorize('pesanan');

        $orders = DB::table('pesanan')
            ->select('analisis.*', 'pengujian.baku_mutu')
            ->join('analisis', 'analisis.pesanan_id', '=', 'pesanan.id')
            ->join('pengujian', 'pengujian.id', '=', 'analisis.pengujian_id')
            ->where('pesanan.id', $id)
            ->get();


        $order = Pesanan::with('layanan')->find($id);
        $statusPesanan = StatusPesanan::where('status', $order->status_pesanan)->first()->label;
        // dd($statusPesanan);
        // dd($order);
        // dd($orders);
        return view('pesanan-admin.canceled.detail', [
            'title' => 'Detail Pesanan',
            'orders' => $orders,
            'pesanan' => $order,
            'statusPesanan' => $statusPesanan
        ]);
    }
}
