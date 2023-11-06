@extends('home-landing.master')
@section('content')

@include('home-landing.order-layanan.banner')
    <div class="container">
        <div class="row">
            <div class="col-lg-4 order-1 ml-lg-5 order-lg-2 col-12">
                <img src="/image/layanan-udara.jpg" class="img-fluid" alt="">
            </div>
            
            <div class="col-lg-7 order-2 order-lg-1 col-12">
                <p class="lead text-justify">
                    Kesehatan manusia, makhluk hidup dan unsur lingkungan hidup lainnya membutuhkan dan dipengaruhi oleh udara bebas (udara ambien) di permukaan bumi. Dalam menjalani kegiatan usaha atau industri yang memiliki dampak terhadap lingkungan, pemerintah menetapkan regulasi mengenai ambang batas baku mutu udara ambien. Ambang batas baku mutu udara ambien merupakan batas maksimal kualitas udara ambien yang diperbolehkan seperti kadar zat atau komponen untuk mengetahui tingkat pencemaran dalam udara ambien tersebut. 
                </p>
               
                <p class="lead text-justify">
                    Dengan melakukan pemantauan atau pengujian udara ambien, dapat diketahui kualitas udara bebas dalam lingkungan perusahaan/Pemukiman. <strong>UPTD Laboratorium Lingkungan kota Tangerang Selatan</strong> merupakan Laboratorium lingkungan terakreditasi KAN yang dapat membantu dalam melakukan pemantauan atau pengujian udara ambien dengan teknik pengambilan contoh uji sesuai dengan Standar Nasional Indonesia (SNI).
                </p>
            </div>
           
        </div>
        <div class="row mt-5 mb-5">
            <div class="col">
                <p class="display-6 text-primary">
                    <strong>Sudahkah Udara Ambien di lingkungan anda sesuai Baku Mutu?</strong>
                </p>
                <p class="lead">
                    Order sekarang atau hubungi kami untuk mendapatkan informasi lengkap untuk layanan ini.
                </p>
                <a href="/order-layanan/order" class="btn button-custom btn-sm rounded">Order Layanan</a>
            </div>
        </div>

    </div>
@endsection