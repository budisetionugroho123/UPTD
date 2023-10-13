@extends('home-landing.master')
@section('content')

@include('home-landing.order-layanan.banner')
    <div class="container">
        <div class="row">
            <div class="col-lg-4 order-1 ml-lg-5 order-lg-2 col-12">
                <img src="/image/air_permukaan.jpg" class="img-fluid" alt="">
            </div>
            
            <div class="col-lg-7 order-2 order-lg-1 col-12">
                <p class="lead text-justify">
                    Selain air tanah, air permukaan merupakan salah satu sumber air yang dapat dimanfaatkan. Air permukaan adalah air mengalir atau yang berada di permukaan tanah seperti sungai, rawa dan danau. Air permukaan memiliki karakteristik masing-masing tergantung dari lokasi dan pembentukkan yang masuk ke dalam air tersebut.
                </p>
                <p class="lead text-justify">
                    Bagi industri yang memanfaatkan air permukaan seperti sungai sebagai lokasi pembuangan air limbah yang telah di olah sebelum dilakukan pembuangan, wajib melakukan pemantauan dan pengujian air permukaan secara berkala. Hal ini bertujuan untuk selalu memastikan sungai tidak tercemar dan air yang dibuang tidak mencemari lingkungan. 
                </p>
                <p class="lead text-justify">
                    Dengan melakukan pemantauan dan pengujuan air permukaan, dapat diketahui kulitas air tersebut. <strong>UPTD Laboratorium Lingkungan kota Tangerang Selatan</strong>  merupakan laboratorium lingkungan terakreditasi KAN yang dapat membantu dalam melakukan pemantauan atau pengujian kualitas air dengan teknik pengambilan sample uji sesuai dengan Standar Nasional Indonesia (SNI).
                </p>
            </div>
           
        </div>
        <div class="row mt-5 mb-5">
            <div class="col">
                <p class="display-6 text-primary">
                    <strong>Berencana memanfaatkan Air Permukaan untuk aktifitas anda?</strong>
                </p>
                <p class="lead">
                    Order sekarang atau hubungi kami untuk mendapatkan informasi lengkap untuk layanan ini.
                </p>
                <a href="/order-layanan/order" class="btn button-custom btn-sm rounded">Order Layanan</a>
            </div>
        </div>

    </div>
@endsection