@extends('home-landing.master')
@section('content')

@include('home-landing.order-layanan.banner')
    <div class="container">
        <div class="row">
            <div class="col-lg-4 order-1 ml-lg-5 order-lg-2 col-12">
                <img src="/image/air_higiene.jpg" class="img-fluid" alt="">
            </div>
            
            <div class="col-lg-7 order-2 order-lg-1 col-12">
                <p class="lead text-justify">
                    Air memiliki peranan penting dalam kehidupan terutama air Bersih/Higiene sanitasi yang menjadi kebutuhan bagi manusia untuk dimanfaatkan dalam beraktifitas. Air bersih yang umum digunakan berasal dari air tanah, PDAM, air permukaan atau mata air. Dengan melakukan pengujian, dapat diketahui apakah air mengandung zat berbahaya yang dapat membahayakan apabila digunakan dalam beraktivitas. Dari hasil pengujian dapat diketahui, apakah kualitas air melalui kandungan zat-zat di dalamnya baik dan apabila bermasalah, dapat diketahui berasal dari air atau sumber lainnya berdasarkan parameter pengujian.
                </p>
               
                <p class="lead text-justify">
                    Dengan melakukan pemantauan dan pengujuan Air bersih/Higiene sanitasi, dapat diketahui kulitas air tersebut. <strong>UPTD Laboratorium Lingkungan kota Tangerang Selatan</strong> merupakan laboratorium lingkungan terakreditasi KAN yang dapat membantu dalam melakukan pemantauan atau pengujian kualitas air dengan teknik pengambilan contoh uji sesuai dengan Standar Nasional Indonesia (SNI).
                </p>
            </div>
           
        </div>
        <div class="row mt-5 mb-5">
            <div class="col">
                <p class="display-6 text-primary">
                    <strong>Bagaimana kualitas Air bersih/higiene sanitasi anda?</strong>
                </p>
                <p class="lead">
                    Order sekarang atau hubungi kami untuk mendapatkan informasi lengkap untuk layanan ini.
                </p>
                <a href="/order-layanan/order" class="btn btn-primary btn-sm rounded">Order Layanan</a>
            </div>
        </div>

    </div>
@endsection