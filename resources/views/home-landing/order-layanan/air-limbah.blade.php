@extends('home-landing.master')
@section('content')

@include('home-landing.order-layanan.banner')
    <div class="container">
        <div class="row">
            <div class="col-lg-4 order-1 ml-lg-5 order-lg-2 col-12">
                <img src="/image/air_limbah.jpg" class="img-fluid" alt="">
            </div>
            
            <div class="col-lg-7 order-2 order-lg-1 col-12">
                <p class="lead text-justify">
                    Air limbah adalah air sisa atau buangan yang telah mengalami penurunan kualitas berasal dari kegiatan industri, perkantoran, pemukiman, pertanian dan tempat umum seperti hotel, restoran, pasar dan sebagainya. Pemerintah menetapkan regulasi mengenai baku mutu air limbah sebagai acuan kadar unsur pencemaran dalam air limbah yang akan dibuang atau dilepas ke sistem pembuangan air limbah. Air limbah yang akan dibuang atau dilepas sebelumnya harus melalui proses pengolahan melalui Instalasi Pengolahan Air Limbah (IPAL). 
                </p>
                <p class="lead text-justify">
                    Apabila dari hasil pemantauan dan pengujian air limbah terdapat kadar suatu unsur di atas kadar yang ditetapkan, maka penanggung jawab usaha tersebut wajib melakukan perbaikan terhadap pengolahan air limbah. Tetapi, jika air limbah yang dihasilkan masih dikategorikan baik maka dapat dimanfaatkan kembali tanpa harus dibuang dengan membuat permohonan persetujuan teknis pemanfaatan air limbah untuk aplikasi ke tanah melalui KLHK. 
                </p>
                <p class="lead text-justify">
                    Dengan melakukan pemantauan dan pengujian air limbah secara teratur, dapat diketahui kualitas suatu air limbah dan pencegahan yang diperlukan. <strong> UPTD Laboratorium Lingkungan kota Tangerang Selatan</strong> merupakan laboratorium lingkungan terakreditasi KAN yang dapat membantu dalam melakukan pemantauan atau pengujian air limbah dengan teknik pengambilan Contoh uji sesuai dengan Standar Nasional Indonesia (SNI).
                </p>
            </div>
           
        </div>
        <div class="row mt-5 mb-5">
            <div class="col">
                <p class="display-6 text-primary">
                    <strong>Bagaimana kualitas air limbah yang anda hasilkan?</strong>
                </p>
                <p class="lead">
                    Order sekarang atau hubungi kami untuk mendapatkan informasi lengkap untuk layanan ini.
                </p>
                <a href="/order-layanan/order" class="btn btn-primary btn-sm rounded">Order Layanan</a>
            </div>
        </div>

    </div>
@endsection