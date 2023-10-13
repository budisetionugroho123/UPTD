@extends('home-landing.master')
@section('content')
    {{-- <div class="container">
        <div class="row">
            <div class="col-9">
                <img src="/image/header 2.png" width="1000" height="250px" alt="">
            </div>
            <div class="col-3 mt-5">
                <span><i class='bx bxs-envelope'></i> budinugrohomei6@gmail.com</span>
                <br>
                <span><i class='bx bxs-envelope'></i>082283646583</span>
            </div>
        </div>

    </div> --}}

    <!-- ======= Top Bar ======= -->
    {{-- <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
            <i class="bi bi-envelope-fill"></i><a href="mailto:contact@example.com">info@example.com</a>
            <i class="bi bi-phone-fill phone-icon"></i> +1 5589 55488 55
        </div>
        <div class="social-links d-none d-md-block">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
        </div>
        </div>
    </section> --}}


    <!-- ======= Hero Section ======= -->
    <div id="hero" style="background-image: url('/image/web-hero.jpg'); width:100%; height: 100vh;    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;">
        {{-- <div  style="width: 70%;height: 40; margin-top: 15vh; margin-left: 15vh; background-color: RGBA( 21, 148, 220, 0.5 )" class="ml-auto mr-auto text-center  p-3 rounded"> --}}
            {{-- <div class="container " style="">
                <h2 class="animate__animated animate__fadeInDown">Selamat Datang</h2>
                <p style="color: fff; font-size: 20px" class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
                </div> --}}
                {{-- <div id="carouselExampleInterval"  style="width: 70%;height: 40vh; margin-top: 15vh;" class="carousel slide ml-auto mr-auto" data-ride="carousel">
                    
                  </div> --}}
                  
    <section id="hero" style="margin-left: auto;margin-right:auto; height: 60vh;margin-top:20vh">
        <div id="heroCarousel"  data-bs-interval="5000" class="carousel ml-auto slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

            <!-- Slide 1 -->
            <div class="carousel-item active  " style="background-color: RGBA( 21, 148, 220, 0.75 )">
            <div class="carousel-container">
                <div class="container">
                    <div class="row">
                        <div class="col-7 mt-5">
                            <p class="text-dark">
                                <strong>
                                    Pengujian Kualitas Lingkungan Oleh Petugas Pengambil Contoh Uji yang Tersertifikasi oleh BNSP
                                </strong>
                            </p>
                            <p class="text-dark">
                                Berdasarkan PerMenLHK RI No 23 Tahun 2020, contoh uji lingkungan harus diambil oleh petugas laboratorium yang memiliki sertifikat aktif sebagai petugas pengambilan contoh dari BNSP
                            </p>
                        </div>
                        <div class="col-5 ">
                            <img src="/image/peneliti.png" width="350" alt="">
                            
                        </div>
                    </div>
                {{-- <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Green</span></h2>
                <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a> --}}
                </div>
            </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item" style="background-color: RGBA( 21, 148, 220, 0.75 )">
            <div class="carousel-container">
                <div class="container">
                    <div class="row">
                        <div class="col-7 mt-5">
                            <p class="text-dark">
                                <strong>
                                    Pengujian Kualitas Lingkungan Oleh Analisis Laboratorium yang Berkompeten
                                </strong>
                            </p>
                            <p class="text-dark">
                                Demi kepuasan pelanggan kami, terus meningkatnya Kompetensi Analisis Laboratorium sesuai ISO 17025
                            </p>
                        </div>
                        <div class="col-5 ">
                            <img src="/image/peneliti.png" width="350" alt="">
                            
                        </div>
                    </div>
                {{-- <h2 class="animate__animated animate__fadeInDown">Lorem Ipsum Dolor</h2>
                <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a> --}}
                </div>
            </div>
            </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

        </div>
    </section><!-- End Hero -->
        {{-- </div> --}}
    </div>



    <main id="main">

        <!-- ======= About Us Section ======= -->
        <section id="about" class="about" style="height: 80vh">
        <div class="container">

            <div class="section-title">
            {{-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div> --}}

            <div class="row">

            <div class="col-lg-6 order-1 order-lg-2">
                <img src="/Green/assets/img/about.jpg" style="width: 70vh" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                {{-- <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3> --}}
                <h2>Tentang Kami</h2>

                <p class="text-dark"><strong>UPTD Laboratorium Lingkungan yang merupakan bagian dari struktur organisasi Dinas Lingkungan Hidup Kota Tangerang Selatan telah terakreditasi oleh Komite Akreditasi Nasional dan Terigritasi oleh Kementrian Lingkungan Hidup dan Kehutanan selalu berkomitmen untuk menjaga dan melindungi lingkungan dengan layanan pengujian yang terpercaya dan terdepan.</strong></p>
                {{-- <p class="fst-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua.
                </p>
                <ul>
                <li><i class="bi bi-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                <li><i class="bi bi-check-circled"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                <li><i class="bi bi-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
                </ul>
                <p>
                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                culpa qui officia deserunt mollit anim id est laborum
                </p> --}}
            </div>
            </div>

        </div>
        </section><!-- End About Us Section -->

        <!-- ======= Our Clients Section ======= -->
        {{-- <section id="clients" class="clients">
        <div class="container">

            <div class="section-title">
            <h2>Our Clients</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>

            <div class="clients-slider swiper">
            <div class="swiper-wrapper align-items-center">
                <div class="swiper-slide"><img src="/Green/assets/img/clients/client-1.png" class="img-fluid" alt=""></div>
                <div class="swiper-slide"><img src="/Green/assets/img/clients/client-2.png" class="img-fluid" alt=""></div>
                <div class="swiper-slide"><img src="/Green/assets/img/clients/client-3.png" class="img-fluid" alt=""></div>
                <div class="swiper-slide"><img src="/Green/assets/img/clients/client-4.png" class="img-fluid" alt=""></div>
                <div class="swiper-slide"><img src="/Green/assets/img/clients/client-5.png" class="img-fluid" alt=""></div>
                <div class="swiper-slide"><img src="/Green/assets/img/clients/client-6.png" class="img-fluid" alt=""></div>
                <div class="swiper-slide"><img src="/Green/assets/img/clients/client-7.png" class="img-fluid" alt=""></div>
                <div class="swiper-slide"><img src="/Green/assets/img/clients/client-8.png" class="img-fluid" alt=""></div>
            </div>
            <div class="swiper-pagination"></div>
            </div>

        </div>
        </section><!-- End Our Clients Section --> --}}

        <!-- ======= Services Section ======= -->
        <section id="services" class="services" style="background-color:rgb(236, 240, 241);">
        <div class="container">

            <div class="section-title">
            <h2>Layanan</h2>
           
            </div>

            <div class="row">
            <div class="col-lg-6 col-md-6 d-flex align-items-stretch "  data-aos="zoom-in" data-aos-delay="100">
                <div class="icon-box iconbox-blue w-100 ">
                <div class="icon">
                    <img src="/image/icon/air_limbah.png" width="100" height="100">
                </div>
                <h4><a href="">Uji Kualitas Air Limbah</a></h4>
                <p><a href="/order-layanan/air-limbah" class="btn button-custom rounded">Selengkapnya</a></p>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
                <div class="icon-box iconbox-orange w-100 ">
                <div class="icon">
                    <img src="/image/icon/air_higiene.png" width="100" height="100">
                </div>
                <h4><a href="">Uji Kualitas Air Higiene Sanitasi</a></h4>
                <p><a href="/order-layanan/air-higiene" class="btn button-custom rounded">Selengkapnya</a></p>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
                <div class="icon-box iconbox-yellow w-100">
                <div class="icon">
                    <img src="/image/icon/air_permukaan.png" width="100" height="100">
                </div>
                <h4><a href="">Uji Kualitas Air Permukaan</a></h4>
                <p><a href="/order-layanan/air-permukaan" class="btn button-custom rounded">Selengkapnya</a></p>
                </div>
            </div>


            <div class="col-lg-6 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
                <div class="icon-box iconbox-teal w-100">
                <div class="icon">
                    <img src="/image/icon/wind.png" width="100" height="100">
                </div>
                <h4><a href="">Uji Kualitas Udara Ambien</a></h4>
                <p><a href="/order-layanan/udara-ambien" class="btn button-custom rounded">Selengkapnya</a></p>
                </div>
            </div>

            </div>

        </div>
        </section><!-- End Services Section -->
        <section id="order-layanan">
            <div class="container">
                <div class="section-title">
                    <h2>ORDER LAYANAN</h2>
                    <h3>
                        <strong>
                            Kami Memberikan Hasil yang Terbaik Untuk Setiap Pelanggan
                        </strong>
                    </h3>
                    <a href="/order-layanan/order" class="btn rounded p-3 button-custom"  >ORDER LAYANAN SEKARANG</a>
                    <p class="mt-2">Atau kontak kami melalui <a class="rounded p-1" href="https://wa.me/6282283646583" target="_blank" style="background-color:#5cb874;color:white"><i class='bx bxl-whatsapp' ></i>Whatsapp</a></li></p>
                </div>
            </div>
        </section>
        <!-- ======= Cta Section ======= -->
        <section id="daftarHarga" style="background-color:rgb(236, 240, 241);" >
        <div class="container">
            <div class="section-title " style="border-bottom: 2px solid black">
                <h2>Daftar Harga</h2>
                <p class="text-dark">Selamat datang di halaman daftar harga UPTD Laboratorium Lingkungan Kota Tangerang Selatan. Kami dengan senang hati menyediakan berbagai layanan analisis kualitas lingkungan yang dapat membantu anda memahami kondisi lingkungan sekitar anda. Harga yang kami tawarkan telah disusun sesuai dengan ketentuan <strong>Peraturan Daerah Kota Tangerang Selatan Nomor 4 Tahun 2021 tentang Restribusi Daerah.</strong> Kami dengan hormat mematuhi regulasi ini dalam menetapkan harga layanan analisa kualitas lingkungan pada laboratorium kami.</p>

                </div>
            <div class="row mt-3">

                <div class="col-lg-6 col-12 mb-3">
                    <h4 class="text-center text-black">Uji Kualitas Air Higiene</h4>
                    <table class="table  table-sm table-bordered ">
                        <thead  class="thead-dark">
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">JENIS PENGUJIAN</th>
                            <th scope="col">METODE</th>
                            <th scope="col">SATUAN</th>
                            <th scope="col">TARIF (Rp)</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=1;
                                $totalAirLimbah = 0;
                            @endphp
                            @foreach ($airLimbah as $item)
                                <tr>
                                    <th class="text-center" scope="row">{{$i++}}</th>
                                    <td>{{$item->nama_pengujian}}</th>
                                    <td>{{$item->metode}}</td>
                                    <td>{{$item->satuan}}</td>
                                    <td>{{"RP " .number_format($item->tarif,0,',','.');}}</td>
                                </tr>
                                @php
                                  $totalAirLimbah +=$item->tarif  
                                @endphp
                            
                            @endforeach
                            <tr>
                                <td colspan="4" class="text-right pr-2"><strong>Total</strong></td>
                                <td class="pl-2"> <strong>{{"RP " .number_format($totalAirLimbah,0,',','.');}}</strong></td>
                            </tr>
                        </tbody>
                      </table>
                      <h4 class="text-center text-black">Uji Kualitas Air Higiene & Sanitasi</h4>

                    <table class="table  table-sm table-bordered ">
                        <thead  class="thead-dark">
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">JENIS PENGUJIAN</th>
                            <th scope="col">METODE</th>
                            <th scope="col">SATUAN</th>
                            <th scope="col">TARIF (Rp)</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=1;
                                $totalAirHigiene = 0;
                            @endphp
                            @foreach ($airHigiene as $item)
                                <tr>
                                    <th class="text-center" scope="row">{{$i++}}</th>
                                    <td>{{$item->nama_pengujian}}</th>
                                    <td>{{$item->metode}}</td>
                                    <td>{{$item->satuan}}</td>
                                    <td>{{"RP " .number_format($item->tarif,0,',','.');}}</td>
                                </tr>
                                @php
                                  $totalAirHigiene +=$item->tarif  
                                @endphp
                                
                            @endforeach
                            <tr>
                                <td colspan="4" class="text-right pr-2"><strong>Total</strong></td>
                                <td class="pl-2"> <strong>{{"RP " .number_format($totalAirHigiene,0,',','.');}}</strong></td>
                            </tr>
                        </tbody>
                      </table>
                      <h4 class="text-center text-black">Uji Kualitas Air Permukaan</h4>

                    <table class="table  table-sm table-bordered ">
                        <thead  class="thead-dark">
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">JENIS PENGUJIAN</th>
                            <th scope="col">METODE</th>
                            <th scope="col">SATUAN</th>
                            <th scope="col">TARIF (Rp)</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=1;
                                $totalAirPermukaan = 0;
                            @endphp
                            @foreach ($airPermukaan as $item)
                                <tr>
                                    <th class="text-center" scope="row">{{$i++}}</th>
                                    <td>{{$item->nama_pengujian}}</th>
                                    <td>{{$item->metode}}</td>
                                    <td>{{$item->satuan}}</td>
                                    <td>{{"RP " .number_format($item->tarif,0,',','.');}}</td>
                                </tr>
                                @php
                                  $totalAirPermukaan += $item->tarif  
                                @endphp
                            
                            @endforeach
                            <tr>
                                <td colspan="4" class="text-right pr-2"><strong>Total</strong></td>
                                <td class="pl-2"> <strong>{{"RP " .number_format($totalAirPermukaan,0,',','.');}}</strong></td>
                            </tr>
                        </tbody>
                      </table>
                      <h4 class="text-center text-black">Uji Kualitas Udara Ambien</h4>

                    <table class="table  table-sm table-bordered ">
                        <thead  class="thead-dark">
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">JENIS PENGUJIAN</th>
                            <th scope="col">METODE</th>
                            <th scope="col">SATUAN</th>
                            <th scope="col">TARIF (Rp)</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=1;
                                $totalUdaraAmbien = 0;
                            @endphp
                            @foreach ($udaraAmbien as $item)
                                <tr>
                                    <th class="text-center" scope="row">{{$i++}}</th>
                                    <td>{{$item->nama_pengujian}}</th>
                                    <td>{{$item->metode}}</td>
                                    <td>{{$item->satuan}}</td>
                                    <td>{{"RP " .number_format($item->tarif,0,',','.');}}</td>
                                </tr>
                                @php
                                  $totalUdaraAmbien += $item->tarif  
                                @endphp
                                
                            @endforeach
                            <tr>
                                <td colspan="4" class="text-right pr-2"><strong>Total</strong></td>
                                <td class="pl-2"> <strong>{{"RP " .number_format($totalUdaraAmbien,0,',','.');}}</strong></td>
                            </tr>
                        </tbody>
                      </table>
                </div>
                <div class="col-lg-6 col-12 mb-3">
                    <h4 class="text-center text-black">Uji Kualitas Lingkungan (Satuan)</h4>

                    <table class="table  table-sm table-bordered ">
                        <thead  class="thead-dark">
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">JENIS PENGUJIAN</th>
                            <th scope="col">METODE</th>
                            <th scope="col">SATUAN</th>
                            <th scope="col">TARIF (Rp)</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=1;
                            @endphp
                            <tr>
                                <td colspan="5"><strong>Parameter Fisika</strong></td>
                            </tr>
                            @foreach ($parameterFisika as $item)
                                <tr>
                                    <th class="text-center" scope="row">{{$i++}}</th>
                                    <td>{{$item['nama_pengujian']}}</th>
                                    <td>{{$item['metode']}}</td>
                                    <td>{{$item['satuan']}}</td>
                                    <td>{{"RP " .number_format($item['tarif'],0,',','.');}}</td>
                                </tr>

                                
                            @endforeach
                            <tr>
                                <td colspan="5"><strong> Parameter Kimia</strong></td>
                            </tr>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($parameterKimia as $item)
                            <tr>
                                <th class="text-center" scope="row">{{$i++}}</th>
                                <td>{{$item['nama_pengujian']}}</th>
                                <td>{{$item['metode']}}</td>
                                <td>{{$item['satuan']}}</td>
                                <td>{{"RP " .number_format($item['tarif'],0,',','.');}}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="5"><strong>Parameter Mikrobiologi</strong></td>
                            </tr>
                            @php
                                $i=1;
                            @endphp
                            @foreach ($parameterMikrobiologi as $item)
                            <tr>
                                <th class="text-center" scope="row">{{$i++}}</th>
                                <td>{{$item['nama_pengujian']}}</th>
                                <td>{{$item['metode']}}</td>
                                <td>{{$item['satuan']}}</td>
                                <td>{{"RP " .number_format($item['tarif'],0,',','.');}}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="5"><strong>Parameter Uji Udara Ambien</strong></td>
                            </tr>
                            @php
                                $i=1;
                            @endphp
                            @foreach ($parameterUdara as $item)
                            <tr>
                                <th class="text-center" scope="row">{{$i++}}</th>
                                <td>{{$item['nama_pengujian']}}</th>
                                <td>{{$item['metode']}}</td>
                                <td>{{$item['satuan']}}</td>
                                <td>{{"RP " .number_format($item['tarif'],0,',','.');}}</td>
                            </tr>
                            
                            @endforeach
                        </tbody>
                      </table>
                </div>
                {{-- <div class="col-lg-6 col-12 mb-3">
                    
                </div>
                <div class="col-lg-6 col-12 mb-3">
                    
                </div> --}}
            </div>

        </div>
        </section><!-- End Cta Section -->

    
        <!-- ======= Team Section ======= -->
        <section id="team" class="team section-bg bg-white" > 
        <div class="container">

            <div class="section-title">
            <h2>Team</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>

            <div class="row">
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                <div class="member">
                <img src="/Green/assets/img/team/team-1.jpg" alt="">
                <h4>Walter White</h4>
                <span>Chief Executive Officer</span>
                <p>
                    Magni qui quod omnis unde et eos fuga et exercitationem. Odio veritatis perspiciatis quaerat qui aut aut aut
                </p>
                <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                <div class="member">
                <img src="/Green/assets/img/team/team-2.jpg" alt="">
                <h4>Sarah Jhinson</h4>
                <span>Product Manager</span>
                <p>
                    Repellat fugiat adipisci nemo illum nesciunt voluptas repellendus. In architecto rerum rerum temporibus
                </p>
                <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                <div class="member">
                <img src="/Green/assets/img/team/team-3.jpg" alt="">
                <h4>William Anderson</h4>
                <span>CTO</span>
                <p>
                    Voluptas necessitatibus occaecati quia. Earum totam consequuntur qui porro et laborum toro des clara
                </p>
                <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
                </div>
            </div>

            </div>

        </div>
        </section><!-- End Team Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact" style="background-image: url('/image/lab_kimia2.jpg');background-size: cover;background-repeat: no-repeat;background-position: center;" >
        <div class="container">

            <div class="section-title">
            <h2 class="text-white">KONTAK</h2>
            
            </div>

            <div class="row">

            <div class="col-lg-5  align-items-stretch text-dark">
               
                <div class="info">
                    <h2>Butuh Konsultasi?</h2>
                    <h2>Silahkan Kontak Kami</h2>
                    <h2 class="p-3">Kami Siap Membantu</h2>
                    <div class="address">
                        <i class="bi bi-geo-alt"></i>
                        <h4>Location:</h4>
                        <p>Jl. Raya Serpong No.1 Setu Kec. Serpong, Kota Tangerang Selatan</p>
                    </div>
                    <div class="email">
                        <i class="bi bi-envelope"></i>
                        <h4>Email:</h4>
                        <p>lablingblhdtangsel@gmail.com</p>
                    </div>
                    <div class="phone">
                        <i class="bi bi-phone"></i>
                        <h4>Call:</h4>
                        <p>081-319639706</p>
                    </div>
                    <div class="phone">
                        <i class=" bi bi-twitter"></i><i class="ml-3 bi bi-instagram"></i><i class=" ml-3 mr-3 bi bi-facebook"></i>
                        <h4>Sosial Media:</h4>
                        <p>labdlhtangsel</p>
                    </div>
                </div>
                {{-- 


                <div class="phone">
                    <i class="bi bi-phone"></i>
                    <h4>Call:</h4>
                    <p>+1 5589 55488 55s</p>
                </div>

                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                </div> --}}

            </div>

            <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                <div class="row">
                    <div class="form-group col-md-6">
                    <label for="name">Your Name</label>
                    <input type="text" name="name" class="form-control" id="name" required>
                    </div>
                    <div class="form-group col-md-6 mt-3 mt-md-0">
                    <label for="name">Your Email</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <label for="name">Subject</label>
                    <input type="text" class="form-control" name="subject" id="subject" required>
                </div>
                <div class="form-group mt-3">
                    <label for="name">Message</label>
                    <textarea class="form-control" name="message" rows="10" required></textarea>
                </div>
                <div class="my-3">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
                </form>
            </div>

            </div>

        </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
   

  @endsection