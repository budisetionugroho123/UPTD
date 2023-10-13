@extends('home-landing.master')
@section('content')
<div class="container pt-3">
    <div class="row " style="margin-top: 70px; margin-bottom: 300px">
        <div class="col">
            <table class="table  table-sm table-striped table-bordered bordered w-100"  id="table">
                <thead>
                    <th>No</th>
                    <th >Nama Perusahaan</th>
                    <th >Nama Layanan (Pengujian)</th>
                    <th >Jenis Sampel</th>
                    <th >Sistem Layanan</th>
                    <th >Status</th>
                    <th >Status Pembayaran</th>
                    <th class="text-center">Detail</th>
                </thead>
                <tbody>
                    @php
                        $count = 1;
                    @endphp
                    @foreach ($orders as $item)
                    <tr>
                        <td>{{$count++}}</td>
                        <td>{{$item['nama_perusahaan']}}</td>
                        <td>{{$item['nama_layanan']}}</td>
                        <td>{{$item['jenis_sampel']}}</td>
                        <td>{{$item['jenis_layanan']}}</td>
                        <td>{{$item['status_pesanan']}}</td>
                        <td>{{$item['status_pembayaran']}}</td>
                        <td class="text-center"><a href="{{route('customer.pesanan.detail', $item['id'])}}" class="bi bi-eye btn btn-info"></a></td>
                    </tr>
                        
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
      
@endsection