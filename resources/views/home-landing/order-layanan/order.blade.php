@extends('home-landing.master')
@section('content')

@include('home-landing.order-layanan.banner')
    <div class="container mb-5">
        <div class="row">
            <div class="col">
                <p class="lead">
                    UPTD Laboratorium Lingkungan kota Tangerang Selatan melayani pengujian kualitas lingkungan sesuai kebutuhan pelanggan dan regulasi yang berlaku. Petugas kami dapat datang ke lokasi untuk pengambilan contoh uji atau pelanggan dapat datang langsung ke Laboratorium kami untuk konsultasi kebutuhan pengujian maupun langsung membawa contoh uji sesuai persyaratan.
                </p>
                <p class="display-6 mt-5 text-black"> <strong>Petugas Pengambil Contoh Uji Datang Ke Lokasi</strong></p>
                <p class="lead">
                    Berdasarkan Peraturan <strong>Menteri Lingkungan Hidup dan Kehutanan Republik Indonesia Nomor P.23/MENLHK/SETJEN/KM.1/10/2020</strong> tentang Laboratorium Lingkungan, bahwa contoh uji lingkungan seperti Air Limbah, Air Sungai, Air Danau, <strong>Air Laut harus diambil oleh petugas Laboratorium</strong> yang memiliki kompetensi sebagai Petugas Pengambil Contoh Uji yang memiliki sertifikat aktif dari Badan Nasional Sertifikasi Profesi (BNSP).
                </p>
                <a href="/order-layanan/order/datang-ke-lokasi" class="btn button-custom rounded ">Petugas Kami Ke Lokasi</a>
                {{-- laboratorium --}}
                <p class="display-6 mt-5 text-black"><strong>Pelanggan Datang Langsung Ke Laboratorium</strong></p>
                <p class="lead">Selain Pengujian Kualitas lingkungan seperti Air Higiene & Sanitasi, Pelanggan dapat langsung membawa contoh uji ke laboratorium kami dengan persyaratan tertentu.</p>
                <a href="/order-layanan/order/datang-ke-laboratorium" class="btn button-custom rounded ">Datang Ke Laboratorium</a>
            </div>
        </div>
    </div>
@endsection