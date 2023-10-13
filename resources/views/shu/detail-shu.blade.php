@extends('layouts.master')
@section('content')
<div class="container bg-white" >
    <div class="row   justify-content-center">
        <div class="col-lg-12 m-5">
            <form action="" class="mb-5">
                <div class="form-group row mb-3">
                    <label for="nama_perusahaan" class="col-sm-2 col-form-label">Nama Perusahaan</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama_perusahaan" disabled class="form-control" id="nama_perusahaan" value="{{$order->nama_perusahaan}}" >
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="nama_perusahaan" class="col-sm-2 col-form-label">Nama Layanan</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama_perusahaan" disabled class="form-control" id="nama_perusahaan" value="{{$order->layanan->nama_layanan}}" >
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="nama_perusahaan" class="col-sm-2 col-form-label">Identitas Sampel</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama_perusahaan" disabled class="form-control" id="nama_perusahaan" value="{{$order->identitas_sampel}}" >
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="status_pesanan" class="col-sm-2 col-form-label">Status Pesanan</label>
                    <div class="col-sm-10">
                        <input type="text" name="status_pesanan" disabled class="form-control" id="status_pesanan" value="{{$statusPesanan}}" >
                    </div>
                </div>
            </form>
            <form>
                @csrf
                <input type="hidden" name="pesanan_id" value="{{$order->id}}">
                <table class="table border table-bordered table-striped" id="table-analisis" style="width: 100%">
                    <thead>
                        <th>Nama Pengujian</th>
                        <th>Status</th>
                        <th>Baku Mutu</th>
                        <th>Hasil</th>
                        <th>Keterangan</th>
                        <th>Validasi</th>
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
                            <td>
                                <select name="{{$parameter->id}}" id="" {{$parameter->status != "Menunggu Validasi" ? 'disabled' : ""}} class="form-select"> 
                                    @if ($parameter->status == "Valid" || $parameter->status == "Tidak Valid")
                                        <option value="{{$parameter->status}}">{{$parameter->status}}</option>
                                    @else 
                                        <option value="">Pilih</option>
                                    @endif
                                    <option value="Valid">Valid</option>
                                    <option value="Tidak Valid">Tidak Valid</option>
                                </select>
                            </td>
                            {{-- <td>{{$order->keterangan}}</td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table >
                <a href="{{route('generate.shu', $order->id)}}" class=" btn btn-sm btn-primary ml-5 pl-5 mt-3">Generate PDF</a>
                <a href="{{route('validasi.shu', $order->id)}}" class=" btn btn-sm btn-primary ml-5 pl-5 mt-3">Validasi Shu</a>

            </form>
        </div>
    </div>
</div>
@endsection