<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;

class LayananController extends Controller
{
    //
    public function create()
    {
        $this->authorize('kepala_lab');
        return view('layanan.create', ['title' => 'Tambah Layanan']);
    }
    public function list()
    {
        $this->authorize('kepala_lab');
        $layanan = Layanan::all();
        $data = [
            'layanan' => $layanan
        ];
        $title = 'Daftar Layanan';
        return view('layanan.list', compact('data', 'title'));
    }
    public function detail($id)
    {
        $this->authorize('kepala_lab');

        // $layanan = Layanan::where('uuid', $id)->first();
        $layanan = Layanan::with('parameters')->where('uuid', $id)->first();
        $data = [
            'layanan' => $layanan,
        ];
        $title = "Detail Layanan";
        return view('layanan.detail', compact('data', 'title'));
    }
    public function edit(Request $request)
    {
        $this->authorize('kepala_lab');
        $validateData = $request->validate([
            'nama_layanan' => 'required',
            'jenis_sampel' => 'required',
            'acuan_pengambilan_sampel' => 'required'
        ]);
        $layanan = Layanan::find($request->id);

        $validateData['antar_lab'] = $request->antar_lab == 1 ? true : false;
        $validateData['datang_ke_lokasi'] = $request->datang_ke_lokasi == 1 ? true : false;
        $layanan->update($validateData);
        return redirect('layanan/list')->with('success', 'Ubah data layanan berhasil');
    }
    public function storeLayanan(Request $request)
    {
        $this->authorize('kepala_lab');
        $validateData = $request->validate([
            'nama_layanan' => 'required',
            'jenis_sampel' => 'required',
            'acuan_pengambilan_sampel' => 'required',
            'identitas_layanan' => 'required'
        ], [
            'nama_layanan.required' => "Nama layanan harus diisi",
            'jenis_sampel.required' => "Jenis sampel harus diisi",
            'identitas_layanan.required' => "Identitas layanan harus diisi",
            'acuan_pengambilan_sampel.required' => "Acuan Pengambilan sampel harus diisi",
        ]);

        $kodeSampel = "";
        $explode = explode(' ', strtolower($request->jenis_sampel));
        $validateData['kode_sampel'] = implode('_', $explode);
        $validateData['antar_lab'] = $request->antar_lab == 1 ? true : false;
        $validateData['datang_ke_lokasi'] = $request->datang_ke_lokasi == 1 ? true : false;
        $validateData['uuid'] = (string)Str::uuid();
        // dd($validateData);
        Layanan::create($validateData);
        return redirect('/layanan/list')->with('message', 'Berhasil menambahkan layanan');
    }
    public function deleteLayanan(Request $request)
    {
        $this->authorize('kepala_lab');
        Layanan::find($request->id)->delete();
        return back()->with('success', 'Berhasil hapus layanan');
    }
}
