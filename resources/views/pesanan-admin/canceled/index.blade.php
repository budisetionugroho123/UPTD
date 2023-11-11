@extends('layouts.master')
@section('content')
<div class="container bg-white mb-5">
    <div class="row   justify-content-center">
        <div class="col-lg-10 m-5">
            {{-- <p class="display-6 text-center">Filter Pesanan</p> --}}
            <form class="row align-items-center">
                
                <div class="col-sm-3">
                  <select class="form-select" name="nama_perusahaan" id="specificSizeSelect">
                    <option value="">Pilih Perusahaan</option>
                    @foreach ($listPerusahaan as $perusahaan)
                        <option value="{{$perusahaan->nama_perusahaan}}">{{$perusahaan->nama_perusahaan}}</option>
                    @endforeach
                  </select>
                </div>
              
                
                <div class="col-sm-3 ">
                  <select class="form-select" name="nama_layanan" id="specificSizeSelect">
                    <option value="">Pilih Nama Layanan</option>
                        @foreach ($listLayanan as $layanan)
                            <option value="{{$layanan->id}}">{{$layanan->nama_layanan}}</option>
                        @endforeach
                  </select>
                </div>
                <div class="col-auto ">
                  <button type="submit" class="btn btn-primary">Filter</button>
                </div>
              </form>
        </div>
    </div>
</div>
<div class="container bg-white"  >

    <div class="row   justify-content-center">
        <div class="col-lg-12 m-5">
            <table class="table border table-striped table-bordered"   id="table">
                <thead class="text-center">
                    <th>No</th>
                    <th>Nama Perusahaan</th>
                    <th>Alamat Perusahaan</th>
                    <th>Telephone Perusahaan</th>
                    <th>Nama PIC</th>
                    <th>No PIC</th>
                    <th class="text-center">Email PIC</th>
                    <th>Nama Layanan</th>
                    <th>Jenis layanan</th>
                    <th>Identitas Sampel</th>
                    <th>Status Pesanan</th>
                    {{-- <th>Tanggal Pengantaran</th>
                    <th>Tanggal Pengambilan</th>
                    <th>Alamat Pengambilan Sampel</th> --}}
                    {{-- <th>Volume Uji Coba</th> --}}
                    <th>Total Harga</th>
                    <th>Status Pembayaran</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @php
                        $i =1;
                    @endphp
                    @foreach ($orders as $order)
                        <tr>
                            <td class="text-center">{{$i++}}</td>
                            <td>{{$order['nama_perusahaan']}}</td>
                            <td>{{$order['alamat_perusahaan']}}</td>
                            <td>{{$order['telephone']}}</td>
                            <td>{{$order['nama_pic']}}</td>
                            <td>{{$order['no_pic']}}</td>
                            <td>{{$order['email_pic']}}</td>
                            <td>{{$order['nama_layanan']['label']}}</td>
                            <td>{{$order['jenis_layanan']}}</td>
                            <td>{{$order['identitas_sampel']}}</td>
                            <td>{{$order['status_pesanan']['label']}}</td>
                            {{-- <td>{{$order['tanggal_pengantaran']}}</td>
                            <td>{{$order['tanggal_pengambilan']}}</td>
                            <td>{{$order['alamat_pengambilan_sampel']}}</td> --}}
                            {{-- <td>{{$order['volume_uji_coba']}}</td> --}}
                            <td>{{$order['total_harga']}}</td>
                            <td>{{$order['status_pembayaran']}}</td>
                            <td>
                                <a href="{{route('order.cancel.detail', $order['id'])}}"><i class="fa fa-eye text-info"></i></a> 
                                {{-- <a href=""><i class="fas fa-trash text-danger"> </i></a> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        
        </div>
    </div>
<div>

@endsection