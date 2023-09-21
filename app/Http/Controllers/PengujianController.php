<?php

namespace App\Http\Controllers;

use App\Models\Pengujian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;

class PengujianController extends Controller
{
    //
    public function addParameter(Request $request)
    {

        $data = [
            'layanan_id' => $request->layanan_id,
            'nama_pengujian' => $request->nama_pengujian,
            'uuid' => (string) Str::uuid(),
            'satuan' => $request->satuan,
            'metode' => $request->metode,
            'baku_mutu' => $request->baku_mutu,
            'acuan_metoda_pengujian' => $request->acuan_metoda_pengujian,
            'tarif' => $request->tarif
        ];
        Pengujian::create($data);
        return back()->with('message', "Berhasil tambah parameter pengujian");
    }
    public function updateParameter(Request $request)
    {
        $data = [
            'layanan_id' => $request->layanan_id,
            'nama_pengujian' => $request->nama_pengujian,
            'satuan' => $request->satuan,
            'metode' => $request->metode,
            'baku_mutu' => $request->baku_mutu,
            'acuan_metoda_pengujian' => $request->acuan_metoda_pengujian,
            'tarif' => $request->tarif
        ];
        Pengujian::where('id', $request->id)->update($data);
        return back()->with('message', "Berhasil ubah parameter pengujian");
    }
    public function deleteParameter(Request $request)
    {
        Pengujian::find($request->id)->delete();
        return back()->with('message', "Berhasil hapus parameter pengujian");
    }
}
