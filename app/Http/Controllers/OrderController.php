<?php

namespace App\Http\Controllers;

use App\Models\Analisis;
use App\Models\Pengujian;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Alert;
use App\Models\Layanan;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    //
    public function orderToLocation()
    {
        $title = 'Delete Data!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('home-landing.order-layanan.form-order-lokasi', [
            'title' => 'Petugas kami Datang ke Lokasi'

        ]);
    }
    public function orderToLab()
    {
        return view('home-landing.order-layanan.form-order-lab', [
            'title' => 'Datang ke Laboratorium'

        ]);
    }
    public function createOrderLoc(Request $request)
    {
        // dd($request->input());
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
            'is_paid' => 0
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
            $this->createEmailCustomer($pesanan);

            $dataPengujian = Pengujian::whereIn('id', $request->inputSatuan)->get();
            // dd($dataPengujian);
            foreach ($dataPengujian as $pengujian) {
                Analisis::create([
                    'pesanan_id' => $pesanan->id,
                    'pengujian_id' => $pengujian->id,
                    'satuan' => $pengujian->satuan,
                    'nama_pengujian' => $pengujian->nama_pengujian,
                    'status' => 'Menunggu Penguji',
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
                    'status' => 'Menunggu Penguji',
                ]);
            }
        }
        // toast('Your Post as been submited!', 'success');

        // Alert::success('Hore!', 'Post Created Successfully');
        return redirect()->back()->with('success', "Berhasil membuat permintaan pesanan");
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
}
