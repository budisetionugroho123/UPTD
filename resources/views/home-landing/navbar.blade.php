  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center">

    <h1 class="logo me-auto"><a href="index.html">UPTD</a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html" class="logo me-auto"><img src="/Green/assets/img/logo.png" alt="" class="img-fluid"></a>-->

    <nav id="navbar" class="navbar">
        <ul>
        <li><a class="nav-link scrollto " href="#hero">Beranda</a></li>
        <li class="dropdown"><a href="#"><span>Tentang</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
            <li><a href="{{request()->route()->getName() == 'order.layanan' ? '/#about' : '#about'}}" class="scrollto">Profil</a></li>
            <li><a href="{{request()->route()->getName() == 'order.layanan' ? '/#team' : '#team'}}" class="scrollto">Sertifikat</a></li>
            </ul>
        </li>
        {{-- <li><a class="nav-link scrollto" href="#about">About</a></li> --}}
            <li><a class="nav-link scrollto active" href="{{request()->route()->getName() == 'order.layanan' || request()->route()->getName() == 'login.customer' || request()->route()->getName() == 'register.customer' ? '/#services' : '#services'}}">Layanan</a></li>
            <li><a class="nav-link scrollto " href="{{request()->route()->getName() == 'order.layanan' || request()->route()->getName() == 'login.customer' || request()->route()->getName() == 'register.customer' ? '/#daftarHarga' : '#daftarHarga'}}">Daftar Harga</a></li>
            <li><a class="nav-link scrollto" href="{{request()->route()->getName() == 'order.layanan' || request()->route()->getName() == 'login.customer' || request()->route()->getName() == 'register.customer' ? '/#order-layanan' : '#order-layanan'}}">Order Layanan</a></li>
            <li><a class="nav-link scrollto" href="{{request()->route()->getName() == 'order.layanan' || request()->route()->getName() == 'login.customer' || request()->route()->getName() == 'register.customer' ? '/#contact' : '#contact'}}">Contact</a></li>
            <li><a class="getstarted scrollto" href="https://wa.me/6282283646583" target="_blank" style="background-color:#5cb874;color:white"><i class='bx bxl-whatsapp' style="font-size: 20px ;background-color:  ;"></i>Customer</a></li>
            @if(Auth::check())
                @if (Auth::user()->role == "customer") 
                    <li class="dropdown"><a href="#"><span>Customer</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            {{-- <li><a href="{{request()->route()->getName() == 'order.layanan' || request()->route()->getName() == 'login.customer' || request()->route()->getName() == 'register.customer' ? '/#about' : '#about'}}" class="scrollto">Profil</a></li> --}}
                            <li><a href="{{route('customer.pesanan.index')}}" class="scrollto">Pesanan Saya</a></li>
                            <li><a href="{{route('logout.customer')}}" class="scrollto">Logout</a></li>
                        </ul>
                    </li>
                @endif
            @else 
                <li><a class="nav-link scrollto " href="/login-customer"><span class="btn button-custom">Login</span></a></li>

            @endif
        </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->