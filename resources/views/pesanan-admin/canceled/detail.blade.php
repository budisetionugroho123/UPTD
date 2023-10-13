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
                            <input type="text" name="nama_perusahaan" class="form-control" disabled id="nama_perusahaan" value="{{$pesanan->nama_perusahaan}}" >
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="alamat_perusahaan" class="col-sm-2 col-form-label">Alamat Perusahaan</label>
                        <div class="col-sm-10">
                            <input type="text"  name="alamat_perusahaan" class="form-control" disabled id="alamat_perusahaan" value="{{$pesanan->alamat_perusahaan}}" >
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="telephone" class="col-sm-2 col-form-label">Telephone</label>
                        <div class="col-sm-10">
                            <input type="text" name="telephone" class="form-control" disabled id="telephone" value="{{$pesanan->telephone}}" >
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="nama_pic" class="col-sm-2 col-form-label">Nama Pic</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_pic" class="form-control" disabled id="nama_pic" value="{{$pesanan->nama_pic}}" >
                        </div>
                    </div>
        
                    <div class="form-group row mb-3">
                        <label for="email_pic" class="col-sm-2 col-form-label">Email Pic</label>
                        <div class="col-sm-10">
                            <input type="text" name="email_pic" class="form-control" disabled id="email_pic" value="{{$pesanan->email_pic}}" >
                        </div>
                    </div>
        
                    <div class="form-group row mb-3">
                        <label for="no_pic" class="col-sm-2 col-form-label">No Pic</label>
                        <div class="col-sm-10">
                            <input type="text" name="no_pic" class="form-control" disabled id="no_pic" value="{{$pesanan->no_pic}}" >
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="nama_layanan" class="col-sm-2 col-form-label">Nama Layanan</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_layanan" class="form-control" disabled id="nama_layanan" value="{{$pesanan->layanan->nama_layanan}}" >
                        </div>
                    </div>
                    
                    <div class="form-group row mb-3">
                        <label for="jenis_layanan" class="col-sm-2 col-form-label">Jenis Layanan</label>
                        <div class="col-sm-10">
                            <input type="text" name="jenis_layanan" class="form-control" disabled id="jenis_layanan" value="{{$pesanan->jenis_layanan == "datang_ke_lokasi"  ? "Datang Ke Lokasi" : "Datang Ke Laboratorium"}}" >
                        </div>
                    </div>
                    
                    <div class="form-group row mb-3">
                        <label for="jenis_pesanan" class="col-sm-2 col-form-label">Jenis Pesanan</label>
                        <div class="col-sm-10">
                            <input type="text" name="jenis_pesanan" class="form-control" disabled id="jenis_pesanan" value="{{$pesanan->jenis_pesanan}}" >
                        </div>
                    </div>
                    
                    <div class="form-group row mb-3">
                        <label for="identitas_sampel" class="col-sm-2 col-form-label">Identitas Sampel</label>
                        <div class="col-sm-10">
                            <input type="text" name="identitas_sampel" class="form-control" disabled id="identitas_sampel" value="{{$pesanan->identitas_sampel}}" >
                        </div>
                    </div>
                    
                    <div class="form-group row mb-3">
                        <label for="status_pesanan" class="col-sm-2 col-form-label">Status Pesanan</label>
                        <div class="col-sm-10">
                            <input type="text" name="status_pesanan" class="form-control" disabled id="status_pesanan" value="{{$statusPesanan}}" >
                        </div>
                    </div>
                    @if (!is_null($pesanan->tanggal_pengambilan))
                    <div class="form-group row mb-3">
                        <label for="tanggal_pengambilan" class="col-sm-2 col-form-label">Tanggal Pengambilan</label>
                        <div class="col-sm-10">
                            <input type="text" name="tanggal_pengambilan" class="form-control" disabled id="tanggal_pengambilan" value="{{$pesanan->tanggal_pengambilan}}" >
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="alamat_pengambilan_sampel" class="col-sm-2 col-form-label">Alamat Pengambilan Sampel</label>
                        <div class="col-sm-10">
                            <input type="text" name="alamat_pengambilan_sampel" class="form-control" disabled id="alamat_pengambilan_sampel" value="{{$pesanan->alamat_pengambilan_sampel}}" >
                        </div>
                    </div>
                        
                    @endif
                    @if (!is_null($pesanan->tanggal_pengantaran))
                    <div class="form-group row mb-3">
                        <label for="tanggal_pengantaran" class="col-sm-2 col-form-label">Tanggal Pengantaran</label>
                        <div class="col-sm-10">
                            <input type="text" name="tanggal_pengantaran" class="form-control" disabled id="tanggal_pengantaran" value="{{$pesanan->tanggal_pengantaran}}" >
                        </div>
                    </div>
                        
                    @endif
                    @if (!is_null($pesanan->volume_uji_coba))
                    <div class="form-group row mb-3">
                        <label for="volume_uji_coba" class="col-sm-2 col-form-label">Volume Uji Coba</label>
                        <div class="col-sm-10">
                            <input type="text" name="volume_uji_coba" class="form-control" disabled id="volume_uji_coba" value="{{$pesanan->volume_uji_coba}}" >
                        </div>
                    </div>
                    
                    @endif
                    <div class="form-group row mb-3">
                        <label for="total_harga" class="col-sm-2 col-form-label">Total harga</label>
                        <div class="col-sm-10">
                            <input type="text" name="total_harga" class="form-control" disabled id="total_harga" value="{{$pesanan->total_harga}}" >
                        </div>
                    </div>
                    
                    
                    {{-- <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Ubah</button>
                        </div>
                    </div> --}}
              </form>

        </div>
    </div>

    <div class="row mt-5">
        <div class="col">
            <form action="{{route('validasi.hasil.analisis')}}" method="POST">
                @csrf
                <table class="table border table-bordered table-striped" id="table-analisis" style="width: 100%">
                    <thead>
                        <th>Nama Pengujian</th>
                        <th>Status</th>
                        <th>Baku Mutu</th>
                        <th>Hasil</th>
                        <th>Keterangan</th>
                    </thead>
                    <tbody>
                        @foreach ($orders as $parameter)
                        <input type="hidden" name="{{$parameter->id}}" value="{{$parameter->id}}">
                        <tr>
                            <td>{{$parameter->nama_pengujian}}</td>
                            @if ($parameter->status == "Menunggu Pengujian")
                                <td class="bg-secondary text-white text-center">{{$parameter->status}}</td>
                            @elseif($parameter->status == "Menunggu Validasi")
                                <td class="bg-warning text-white text-center">{{$parameter->status}}</td>
                            @elseif($parameter->status == "Valid")
                                <td class="bg-success text-white text-center">{{$parameter->status}}</td>
                            @elseif($parameter->status == "Tidak Valid")
                                <td class="bg-danger text-white text-center">{{$parameter->status}}</td>
                            @endif
                            <td class="text-center">{{$parameter->baku_mutu}}</td>
                            <td class="text-center">
                                {{$parameter->hasil_uji}}
                                {{-- <input type="text" class="form-control" disabled name="analisis_{{$parameter->id}}[]" value="{{}}"> --}}
                            </td>
                            <td class="text-wrap col-3">
                                {{$parameter->keterangan}}
                                {{-- <input type="text" class="form-control" disabled name="analisis_{{$parameter->id}}[]" value="{{$parameter->keterangan}}"> --}}
                            </td>
                           
                            {{-- <td>{{$order->keterangan}}</td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table >

            </form>
        </div>
    </div>
</div>

{{-- analisis --}}
{{-- @include('pesanan-admin.analisis') --}}
@endsection