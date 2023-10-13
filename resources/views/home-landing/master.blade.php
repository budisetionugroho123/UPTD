    <!DOCTYPE html>
    <html lang="en">

    <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>UPTD TANGSEL</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <!-- Favicons -->
    <link href="/image/Logo_DPRD_kota_Tangsel.png" rel="icon">
    <link href="/Green/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">

    <!-- Vendor CSS Files -->
    <link href="/Green/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="/Green/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Green/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/Green/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/Green/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/Green/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/order-layanan.css">

    <!-- Template Main CSS File -->
    <link href="/Green/assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <style>
        .button-custom {
        background-color: #1594dc;
        color: #fff;
        } 
        .icon-custom {
        background-color: #1594dc !important;
        color: #fff !important;
        
        }
        .icon-custom:hover{
            color: #1594dc !important;
            background-color: #fff !important;
            border : 1px solid  #1594dc;
        }
        .button-custom:hover{
            border:  1px solid #1594dc;
            
        }
        .bg-footer {
            background-color:rgb(236, 240, 241) !important;            
        }
        .list-unstyled , li {
            font-size: 20px !important;
        } 
    </style>
    <!-- =======================================================
    * Template Name: Green
    * Updated: Jul 27 2023 with Bootstrap v5.3.1
    * Template URL: https://bootstrapmade.com/green-free-one-page-bootstrap-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
    </head>

    <body>
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    @include('sweetalert::alert')
    {{View::make('home-landing.navbar')}}
    
    @yield('content')
    {{View::make('home-landing.footer')}}
    

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <!-- Vendor JS Files -->
    <script src="/Green/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/Green/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/Green/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/Green/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/Green/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="/Green/assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <script>
    // let table = new DataTable('#table');
    new DataTable('#table', {
        fixedColumns: {
        left: 1,
        right: 1
    },
    scrollX: true,
    paging: false,
    ordering: false,
        info:     false,
        searching : false
    });
    

    </script>
    </body>

    </html>