<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    public function index()
    {
        $this->authorize('login');
        if (auth()->user()->role == 'manager_teknis') {
            $users = User::where('role', '!=', 'customer')->get();
        } else {
            $users = User::where('role', '!=', 'customer')->where('id', auth()->user()->id)->get();
        }

        $titleConfirmDelete = 'Hapus Data!';
        $text = "kamu yakin untuk menghapus?";
        confirmDelete($titleConfirmDelete, $text);
        $title = "Daftar Pengguna";
        return view('role.index', compact('users', 'title'));
    }
    public function deleteUser($id)
    {
        $user = User::find($id);

        if ($user->role != "kepala_lab") {
            $user->delete();
        } else {
            return back()->with('errors', 'Akun kepala laboratorium gagal dihapus');
        }
        return back()->with('success', 'Berhasil menghapus data pengguna');
    }
    public function create()
    {
        $roles = Role::where('role', '!=', 'customer')->get();
        return view('role.create', [
            'roles' => $roles,
            'title' => 'Tambah Pengguna'
        ]);
    }
    public function store(Request $request)
    {
        $this->authorize('kepala_lab');
        $validateData = $request->validate([
            'email' => 'email|unique:users'
        ], [
            'email.unique' => 'Email sudah digunakan'
        ]);
        $data = [
            'uuid' => Str::uuid(),
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_hp' => $request->no_hp,
            'role' => $request->role
        ];
        User::create($data);
        return redirect('/role')->with('success', 'Berhasil menambahkan pengguna baru');
    }

    public function edit($id)
    {
        $user = User::where('uuid', $id)->first();
        $user['role_label'] = Role::where('role', $user['role'])->first()->label;
        $roles = Role::where('role', '!=', 'customer')->get();
        return view('role.edit', [
            'user' => $user,
            'roles' => $roles,
            'title' => 'Detail Pengguna'
        ]);
    }
    public function editStore(Request $request)
    {

        $request->validate([
            'photo' => 'mimes:jpg,jpeg,png|max:2048',
            'ttd' => 'mimes:jpg,jpeg,png|max:2048',
        ], [
            'photo.mimes' => 'Mohon input foto dengan tipe png,jpeg,jpg.',
            'photo.max' => 'File tidak boleh lebih dari 2 Mb.',
            'ttd.mimes' => 'Mohon input foto dengan tipe png,jpeg,jpg.',
            'ttd.max' => 'File tidak boleh lebih dari 2 Mb.'
        ]);
        // dd($request->photo->getClientOriginalName());
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'role' => $request->role
        ];
        if (!is_null($request->photo)) {
            $name  =  time() . "_" . $request->file('photo')->getClientOriginalName();
            $request->photo->move(public_path('images/photo'), $name);

            // $request->photo->move(public_path("images/photo", $filename));
            $data['photo'] = $name;
        }
        if (!is_null($request->ttd)) {
            $name  =  time() . "_" . $request->file('ttd')->getClientOriginalName();
            $request->ttd->move(public_path('images/ttd'), $name);

            // $request->ttd->move(public_path("images/ttd", $filename));
            $data['ttd'] = $name;
        }
        User::find($request->id)->update($data);
        return redirect('/role')->with('success', 'Berhasil mengubah data pengguna');
    }

    public function editPassword(Request $request)
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
        return redirect('/role')->with('success', 'Berhasil mengubah password');
    }
}
