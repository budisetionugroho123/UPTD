@extends('home-landing.master')
@section('content')

<div class="container  pt-5 " style="margin-top: ">
    <div class="row mt-5">
        <div class="col">
            <div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between ">
                <div class="step completed">
                  <div class="step-icon-wrap">
                    <div class="step-icon {{$statusPesanan == "Pesanan Dibatalkan" ? "bg-danger text-white" : ""}}"><i class="bi bi-x-circle-fill"></i></div>
                  </div>
                  <h4 class="step-title"> Pesanan Dibatalkan</h4>
                </div>
                <div class="step completed">
                  <div class="step-icon-wrap">
                    <div class="step-icon icon-custom"><i class="bi bi-hourglass"></i></div>
                  </div>
                  <h4 class="step-title"> Menunggu Konfirmasi</h4>
                </div>
                <div class="step completed">
                  <div class="step-icon-wrap">
                    <div class="step-icon {{$statusPesanan != 'Belum konfirmasi' && $statusPesanan != 'Pesanan Dibatalkan' ? "icon-custom" : ""}}"><i class="bi bi-check-circle"></i></div>
                  </div>
                  <h4 class="step-title"> Sudah Dikonfirmasi</h4>
                </div>
                <div class="step completed">
                  <div class="step-icon-wrap">
                    <div class="step-icon {{$order->is_paid == 1 ? "icon-custom" : ""}}"><i class="bi bi-cash"></i></div>
                  </div>
                  <h4 class="step-title">Pembayaran</h4>
                </div>
                <div class="step completed">
                  <div class="step-icon-wrap">
                    <div class="step-icon {{ $statusPesanan == 'Proses Analisa' || $statusPesanan == 'Proses Pengesahan SHU' ||$statusPesanan ==  'Pengesahan SHU Selesai' ? 'icon-custom' : ''}}"><i class="bi bi-pencil-square"></i></div>
                  </div>
                  <h4 class="step-title">Proses Analisa</h4>
                </div>
                <div class="step completed">
                  <div class="step-icon-wrap">
                    <div class="step-icon {{$statusPesanan == "Pengesahan SHU Selesai" ? 'icon-custom' : ""}}"><i class="bi bi-journal-check"></i></div>
                  </div>
                  <h4 class="step-title">Layanan Selesai (Cetak SHU)</h4>
                </div>
            </div>
        </div>
    </div>
           
    

      
</div>
<div class="container bg-white" >
    <div class="row   justify-content-center">
        <div class="col-lg-12 m-5">
            <form action="" class="mb-5">
                @if ($statusPesanan == "Pengesahan SHU Selesai")
                    <div class="form-group row mb-3">
                        <label for="nama_perusahaan" class="col-sm-2 col-form-label">Cetak Shu</label>
                        <div class="col-sm-10">
                            <a class="btn icon-custom" href="{{route('generate.shu', $order->id)}}">Generate SHU PDF</a>
                        </div>
                    </div>
                @endif
                <div class="form-group row mb-3">
                    <label for="nama_perusahaan" class="col-sm-2 col-form-label">Nama Perusahaan</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama_perusahaan" disabled class="form-control" id="nama_perusahaan" value="{{$order->nama_perusahaan}}" >
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="alamat_perusahaan" class="col-sm-2 col-form-label">Alamat Perusahaan</label>
                    <div class="col-sm-10">
                        <input type="text" name="alamat_perusahaan" disabled class="form-control" id="alamat_perusahaan" value="{{$order->alamat_perusahaan}}" >
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="telephone" class="col-sm-2 col-form-label">Telephone/Tax</label>
                    <div class="col-sm-10">
                        <input type="text" name="telephone" disabled class="form-control" id="telephone" value="{{$order->telephone}}" >
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="nama_pic" class="col-sm-2 col-form-label">Nama Pic</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama_pic" disabled class="form-control" id="nama_pic" value="{{$order->nama_pic}}" >
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="no_pic" class="col-sm-2 col-form-label">No Pic</label>
                    <div class="col-sm-10">
                        <input type="text" name="no_pic" disabled class="form-control" id="no_pic" value="{{$order->no_pic}}" >
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="email_pic" class="col-sm-2 col-form-label">Email Pic</label>
                    <div class="col-sm-10">
                        <input type="text" name="email_pic" disabled class="form-control" id="email_pic" value="{{$order->email_pic}}" >
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="nama_perusahaan" class="col-sm-2 col-form-label">Nama Layanan</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama_perusahaan" disabled class="form-control" id="nama_perusahaan" value="{{$order->layanan->nama_layanan}}" >
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="total_pembayaran" class="col-sm-2 col-form-label">Total Pembayaran</label>
                    <div class="col-sm-10">
                        <input type="text" name="total_pembayaran" disabled class="form-control" id="total_pembayaran" value="{{"RP " .number_format($order->total_harga,0,',','.');}}" >
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="jenis_layanan" class="col-sm-2 col-form-label">Sistem Layanan</label>
                    <div class="col-sm-10">
                        <input type="text" name="jenis_layanan" disabled class="form-control" id="jenis_layanan" value="{{$order->layanan->nama_layanan == "datang_ke_lokasi" ? "Petugas Datang Ke Lokasi" : "Pelanggan datang ke Laboratorium"}}" >
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="identitas_sampel" class="col-sm-2 col-form-label">Identitas Sampel</label>
                    <div class="col-sm-10">
                        <input type="text" name="identitas_sampel" disabled class="form-control" id="identitas_sampel" value="{{$order->identitas_sampel}}" >
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="tanggal_pengantaran" class="col-sm-2 col-form-label">Tanggal Pengantaran Sampel</label>
                    <div class="col-sm-10">
                        <input type="text" name="tanggal_pengantaran" disabled class="form-control" id="tanggal_pengantaran" value="{{$order->tanggal_pengantaran}}" >
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="volume_uji_coba" class="col-sm-2 col-form-label">Volume Uji Coba Sampel</label>
                    <div class="col-sm-10">
                        <input type="text" name="volume_uji_coba" disabled class="form-control" id="volume_uji_coba" value="{{$order->volume_uji_coba}}" >
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="tanggal_pengambilan" class="col-sm-2 col-form-label">Tanggal Pengambilan Sampel</label>
                    <div class="col-sm-10">
                        <input type="text" name="tanggal_pengambilan" disabled class="form-control" id="tanggal_pengambilan" value="{{$order->tanggal_pengambilan}}" >
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="alamat_pengambilan_sampel" class="col-sm-2 col-form-label">Alamat Pengambilan Sampel</label>
                    <div class="col-sm-10">
                        <input type="text" name="alamat_pengambilan_sampel" disabled class="form-control" id="alamat_pengambilan_sampel" value="{{$order->alamat_pengambilan_sampel}}" >
                    </div>
                </div>
              
            </form>
            <form>
                @csrf
                <input type="hidden" name="pesanan_id" value="{{$order->id}}">
                <table class="table border table-bordered table-striped" id="table" style="width: 100%">
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
                                <td class="bg-secondary  text-center">{{$parameter->status}}</td>
                            @elseif($parameter->status == "Menunggu Validasi")
                                <td class="bg-warning  text-center">{{$parameter->status}}</td>
                            @elseif($parameter->status == "Valid")
                                <td class="bg-success  text-center">{{$parameter->status}}</td>
                            @elseif($parameter->status == "Tidak Valid")
                                <td class="bg-danger  text-center">{{$parameter->status}}</td>
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
@endsection