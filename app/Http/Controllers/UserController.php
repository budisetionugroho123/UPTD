<?php

namespace App\Http\Controllers;

use App\Mail\LupaPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    //
    public function index()
    {
        return view('auth.login');
    }
    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        // dd($credentials);
        $user = User::where('email', $request->email)->first();

        if ($user) {
            if ($user->role == 'customer') {
                return back()->with('errors', "Customer tidak memiliki akses");
            }
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/dashboard');
        }


        if (!$user) {
            $message = "email tidak ditemukan";
        } else {
            $userPassword = Hash::check('admin', $user->password);
            if (!$userPassword) {
                $message = "password salah";
            }
        }
        return back()->with('errors', $message);
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
    public function sendEmail(Request $request)
    {
        $user = User::where('email', $request->email)->where('role', '!=', 'customer')->first();
        if (!$user) {
            return back()->with('errors', 'Email tidak terdaftar');
        }
        $dataEmail = [
            'email' => $request->email,
            'url' => url("/lab/lupa-password/$request->email")
        ];
        Mail::to([$request->email])->send(new LupaPassword($dataEmail));
        return back()->with('success', 'Email sudah dikirim, silahkan cek email untuk mendapatkan link lupa password!');
    }
    public function lupaPassword($email)
    {
        return view('auth.lupa-password', [
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
        return redirect()->route('login')->with('success', 'Berhasil membuat password baru');
    }
}
