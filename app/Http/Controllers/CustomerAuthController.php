<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CustomerAuthController extends Controller
{
    //
    public function loginCustomer()
    {
        return view('home-landing.login-customer');
    }

    public function authCustomer(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email salah',
            'password' => 'Password harus diisi'
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user) {
            if ($user->role != 'customer') {
                return back()->with('errors', "Email tidak valid untuk customer");
            }
        }
        // dd($credentials);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/');
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

    public function registerCustomer()
    {
        return view('home-landing.register-customer');
    }
    public function createCustomer(Request $request)
    {
        $validateData = $request->validate([
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required'],
            'no_hp' => ['required'],
            'name' => ['required']
        ], [
            'email.required' => 'Email harus diisi',
            'email.unique' => 'Email sudah terdaftar',
            'email.email' => 'Format email salah',
            'password.required' => 'Password harus diisi',
            'no_hp.required' => 'No HP harus diisi',
            'name.required' => 'Nama harus diisi',
        ]);

        $passwordHash = Hash::make($request->password);
        $validateData['password'] = $passwordHash;
        $validateData['role'] = "customer";
        $validateData['uuid'] = Str::uuid();
        User::create($validateData);
        // dd($request->input());
        return redirect()->route('login.customer')->with('success', "Berhasil membuat akun");
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
