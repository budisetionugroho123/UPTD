@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                  <div class="card-body">
                    <h5 class="card-title">Total Pesanan<span></h5>
      
                    <div class="d-flex align-items-center">
                        <div class="ps-3">
                        <h6><i class="bi bi-cart"></i> {{$data['allOrders']}}</h6>      
                        </div>
                    </div>
                    </div>
      
                </div>
            </div>
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                  <div class="card-body">
                    <h5 class="card-title">Pesanan Selesai<span></h5>
                    <div class="d-flex align-items-center">
                        <div class="ps-3">       
                            <h6><i class="bi bi-check-circle-fill"></i> {{$data['orderComplete']}} </h6>      
                        </div>
                    </div>
                    </div>
                </div>
            </div><!-- End Sales Card -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                  <div class="card-body">
                    <h5 class="card-title">Pesanan Dibatalkan<span></h5>
      
                    <div class="d-flex align-items-center">
                        <div class="ps-3">
                            <h6><i class="bi bi-x-circle text-danger" ></i> {{$data['orderCancel']}}</h6>      
                        </div>
                    </div>
                    </div>
      
                </div>
            </div><!-- End Sales Card -->
               
        </div>
    </div>
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <div class="card recent-sales overflow-auto">
  
  
                  <div class="card-body">
                    <h5 class="card-title">Daftar Perusahaan<span></h5>
  
                    <table class="table table-borderless datatable">
                      <thead>
                        <tr>
                          <th scope="col">Nama Perusahaan</th>
                          <th scope="col">Total harga</th>
                          <th scope="col">Status Pembayaran</th>
                          <th scope="col">Jenis Layanan</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($customers as $customer)
                            <tr>
                                <td>{{$customer->nama_perusahaan}}</td>
                                <td>{{$customer->total_harga}}</td>
                                <td>{{$customer->is_paid == 1?  "Sudah Membayar" : "Belum Membayar"}}</td>
                                <td>{{$customer->jenis_layanan == 'datang_ke_lokasi' ? "Petugas ke Lokasi" : "Datang ke Laboratorium"}}</td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
  
                  </div>
  
                </div>
              </div>
        </div>
    </div>
@endsection