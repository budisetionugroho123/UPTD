@extends('layouts.master')
@section('content')
<div class="container bg-white mb-5">
    <p class="w-25 text-center rounded  {{$pesanan->is_paid==0 ? "bg-warning" : "bg-success text-white"}} ml-2 mt-2 p-2">{{$pesanan->is_paid == 0 ? "Belum Membayar" : "Sudah Lunas"}}</p>

    <div class="row justify-content-center">
        <div class="col-lg-10 ml-5 mr-5 mt-3 mb-5">

            <form action="{{route('edit.layanan')}}" method="post" onsubmit="return submitEditLayanan()">
                @csrf
                {{-- <input type="hidden" name="id" value="{{$data['layanan']['id']}}"> --}}
                    <div class="form-group row mb-3">
                        <label for="nama_perusahaan" class="col-sm-2 col-form-label">Nama Perusahaan</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_perusahaan" class="form-control" id="nama_perusahaan" value="{{$pesanan->nama_perusahaan}}" >
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="alamat_perusahaan" class="col-sm-2 col-form-label">Alamat Perusahaan</label>
                        <div class="col-sm-10">
                            <input type="text"  name="alamat_perusahaan" class="form-control" id="alamat_perusahaan" value="{{$pesanan->alamat_perusahaan}}" >
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="telephone" class="col-sm-2 col-form-label">Telephone</label>
                        <div class="col-sm-10">
                            <input type="text" name="telephone" class="form-control" id="telephone" value="{{$pesanan->telephone}}" >
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="nama_pic" class="col-sm-2 col-form-label">Nama Pic</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_pic" class="form-control" id="nama_pic" value="{{$pesanan->nama_pic}}" >
                        </div>
                    </div>
        
                    <div class="form-group row mb-3">
                        <label for="email_pic" class="col-sm-2 col-form-label">Email Pic</label>
                        <div class="col-sm-10">
                            <input type="text" name="email_pic" class="form-control" id="email_pic" value="{{$pesanan->email_pic}}" >
                        </div>
                    </div>
        
                    <div class="form-group row mb-3">
                        <label for="no_pic" class="col-sm-2 col-form-label">No Pic</label>
                        <div class="col-sm-10">
                            <input type="text" name="no_pic" class="form-control" id="no_pic" value="{{$pesanan->no_pic}}" >
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="nama_layanan" class="col-sm-2 col-form-label">Nama Layanan</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_layanan" class="form-control" id="nama_layanan" value="{{$pesanan->layanan->nama_layanan}}" >
                        </div>
                    </div>
                    
                    <div class="form-group row mb-3">
                        <label for="jenis_layanan" class="col-sm-2 col-form-label">Jenis Layanan</label>
                        <div class="col-sm-10">
                            <input type="text" name="jenis_layanan" class="form-control" id="jenis_layanan" value="{{$pesanan->jenis_layanan == "datang_ke_lokasi"  ? "Datang Ke Lokasi" : "Datang Ke Laboratorium"}}" >
                        </div>
                    </div>
                    
                    <div class="form-group row mb-3">
                        <label for="jenis_pesanan" class="col-sm-2 col-form-label">Jenis Pesanan</label>
                        <div class="col-sm-10">
                            <input type="text" name="jenis_pesanan" class="form-control" id="jenis_pesanan" value="{{$pesanan->jenis_pesanan}}" >
                        </div>
                    </div>
                    
                    <div class="form-group row mb-3">
                        <label for="identitas_sampel" class="col-sm-2 col-form-label">Identitas Sampel</label>
                        <div class="col-sm-10">
                            <input type="text" name="identitas_sampel" class="form-control" id="identitas_sampel" value="{{$pesanan->identitas_sampel}}" >
                        </div>
                    </div>
                    
                    <div class="form-group row mb-3">
                        <label for="status_pesanan" class="col-sm-2 col-form-label">Status Pesanan</label>
                        <div class="col-sm-10">
                            <input type="text" name="status_pesanan" class="form-control" id="status_pesanan" value="{{$pesanan->label_status}}" >
                        </div>
                    </div>
                    @if (!is_null($pesanan->tanggal_pengambilan))
                    <div class="form-group row mb-3">
                        <label for="tanggal_pengambilan" class="col-sm-2 col-form-label">Tanggal Pengambilan</label>
                        <div class="col-sm-10">
                            <input type="text" name="tanggal_pengambilan" class="form-control" id="tanggal_pengambilan" value="{{$pesanan->tanggal_pengambilan}}" >
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="alamat_pengambilan_sampel" class="col-sm-2 col-form-label">Alamat Pengambilan Sampel</label>
                        <div class="col-sm-10">
                            <input type="text" name="alamat_pengambilan_sampel" class="form-control" id="alamat_pengambilan_sampel" value="{{$pesanan->alamat_pengambilan_sampel}}" >
                        </div>
                    </div>
                        
                    @endif
                    @if (!is_null($pesanan->tanggal_pengantaran))
                    <div class="form-group row mb-3">
                        <label for="tanggal_pengantaran" class="col-sm-2 col-form-label">Tanggal Pengantaran</label>
                        <div class="col-sm-10">
                            <input type="text" name="tanggal_pengantaran" class="form-control" id="tanggal_pengantaran" value="{{$pesanan->tanggal_pengantaran}}" >
                        </div>
                    </div>
                        
                    @endif
                    @if (!is_null($pesanan->volume_uji_coba))
                    <div class="form-group row mb-3">
                        <label for="volume_uji_coba" class="col-sm-2 col-form-label">Volume Uji Coba</label>
                        <div class="col-sm-10">
                            <input type="text" name="volume_uji_coba" class="form-control" id="volume_uji_coba" value="{{$pesanan->volume_uji_coba}}" >
                        </div>
                    </div>
                    
                    @endif
                    <div class="form-group row mb-3">
                        <label for="total_harga" class="col-sm-2 col-form-label">Total harga</label>
                        <div class="col-sm-10">
                            <input type="text" name="total_harga" class="form-control" id="total_harga" value="{{$pesanan->total_harga}}" >
                        </div>
                    </div>
                    
                    
                    {{-- <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Ubah</button>
                        </div>
                    </div> --}}
              </form>
                @if ($pesanan->status_pesanan == "belum_konfirmasi")
                    <a href="{{route('order.konfirmasi', $pesanan->id)}}" class="btn btn-sm btn-primary" >Konfirmasi</a>
                @endif
                @if ($pesanan->is_paid == 0)                  
                    <a href="/pesanan/konfirmasi-pembayaran/{{$pesanan->id}}" class="btn btn-sm btn-success" >Konfirmasi Pembayaran</a>
                @endif
                @if ($pesanan->status_pesanan == "belum_konfirmasi")
                    <a href="/pesanan/batalkan/{{$pesanan->id}}" class="btn btn-sm btn-danger" >Batalkan</a>
                @endif
        </div>
    </div>

</div>

{{-- analisis --}}
{{-- @include('pesanan-admin.analisis') --}}
@endsection