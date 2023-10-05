<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
}
