<?php

namespace App\Http\Controllers;

use App\Mail\LupaPassword;
use App\Models\Layanan;
use App\Models\Pesanan;
use App\Models\StatusPesanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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
        $this->authorize('customer');

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

    public function profil()
    {
        $this->authorize('customer');

        return view('home-landing.customer.akun', [
            'user' => User::find(auth()->user()->id)
        ]);
    }
    public function updateProfil(Request $request)
    {
        $validateData = $request->validate([
            'email' => ['required', 'email',],
            'no_hp' => ['required'],
            'name' => ['required']
        ], [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email salah',
            'no_hp.required' => 'No HP harus diisi',
            'name.required' => 'Nama harus diisi',
        ]);

        $user = User::find($request->id);
        if ($user->email != $request->email) {
            $existingEmail = User::where('email', $request->email)->first();

            if ($existingEmail) {
                return back()->with('errors', 'Email sudah ada, silahkan menggunakan email lain');
            }
        }
        $user->update($validateData);
        return back()->with('success', 'Berhasil memperbarui data');
    }

    public function changePassword(Request $request)
    {
        // dd($request->input());
        $validateData = $request->validate([
            'password' => 'min:8',
            'konfirmasiPassword' => 'min:8'
        ], [
            'password.min' => 'minimal panjang password adalah 8',
            'konfirmasiPassword.min' => 'minimal panjang password adalah 8',
        ]);
        $user = User::find($request->id);

        $checkPassword = Hash::check($request->passwordlama, $user->password);
        if (!$checkPassword) {
            return back()->with('error', 'Password lama salah');
        }
        $passwordHash = Hash::make($request->password);
        $user->password = $passwordHash;
        $user->update();
        return redirect()->route('customer.profil')->with('success', 'Berhasil mengubah password');
    }
    public function formLupaPassword($email)
    {
        return view('home-landing.customer.lupa-password',  [
            'email' => $email
        ]);
    }
    public function newPassword(Request $request)
    {

        $validateData = $request->validate([
            'password' => 'min:8',
            'konfirmasiPassword' => 'min:8'
        ], [
            'password.min' => 'minimal panjang password adalah 8',
            'konfirmasiPassword.min' => 'minimal panjang password adalah 8',
        ]);

        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->update();
        return redirect()->route('login.customer')->with('success', 'Berhasil membuat password baru');
    }
    public function lupaPassword(Request $request)
    {
        // dd($request->all());
        // dd(url('/lupaPassword'));
        $dataEmail = [
            'email' => $request->email,
            'url' => url("/customer/lupa-password/$request->email")
        ];
        Mail::to([$request->email])->send(new LupaPassword($dataEmail));
        return back()->with('success', 'Email sudah dikirim, silahkan cek email untuk mendapatkan link lupa password!');
    }
}
