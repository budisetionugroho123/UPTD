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
            </form>
            <form action="{{route('store.input.analisis')}}" method="POST">
                @csrf
                <input type="hidden" name="pesanan_id" value="{{$order->id}}">
                <table class="table border table-bordered table-striped" id="table-analisis" style="width: 100%">
                    <thead>
                        <th>Nama Pengujian</th>
                        <th>Status</th>
                        <th>Baku Mutu</th>
                        <th>Hasil</th>
                        <th>Keterangan</th>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <input type="hidden" name="analisis_{{$order->id}}[]">
                        <tr>
                            <td>{{$order->nama_pengujian}}</td>
                            @if ($order->status == "Menunggu Pengujian")
                            <td class="bg-secondary text-white text-center">{{$order->status}}</td>
                            @elseif($order->status == "Menunggu Validasi")
                                <td class="bg-warning text-white text-center">{{$order->status}}</td>
                            @elseif($order->status == "Valid")
                                <td class="bg-success text-white text-center">{{$order->status}}</td>
                            @elseif($order->status == "Tidak Valid")
                                <td class="bg-danger text-white text-center">{{$order->status}}</td>
                            @endif                            
                            <td>{{$order->baku_mutu}}</td>
                            <td>
                                <input type="text" class="form-control" {{($order->status=="Menunggu Validasi" || $order->status=="Valid" ? 'disabled' : "")}} name="analisis_{{$order->id}}[]" value="{{$order->hasi_uji}}">
                            </td>
                            <td>
                                <input type="text" class="form-control" {{($order->status=="Menunggu Validasi" || $order->status=="Valid" ? 'disabled' : "")}} name="analisis_{{$order->id}}[]" value="{{$order->keterangan}}">

                            </td>
                            <input type="hidden" name="analisis_{{$order->id}}[]" value="{{$order->id}}">

                            {{-- <td>{{$order->keterangan}}</td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <button class="btn btn-primary mt-3" type="submit">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection