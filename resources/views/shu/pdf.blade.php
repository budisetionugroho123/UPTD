<!DOCTYPE html>
<html>
<head>
    <title>Hi</title>
     <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style-pdf.css">
</head>
<body>
    {{-- <h1>{{ $title }}</h1> --}}
    {{-- <p>{{ $date }}</p> --}}
    <div class="m-1" style="position: relative">
        <div class="row mt-5">
            <div class="col text-center">
                <h5  class="" style="font-size: 30px"><strong>SERTIFIKAT HASIL UJI</strong></h5 >
                <p style="border-top: 1px solid black; font-size: 12px; ">{{$order->identitas_sampel}}</p>
            </div> 
        </div>
        <div class="row justify-content-center" >
            <div class="col-12 text-center">
                <img style="position: absolute;margin-left:8%; margin-top: 50px; opacity: 0.2; width: 80%; height:550px" src="{{public_path('image/icon/logo_uptd.png')}}"  alt="">
            </div>
        </div>
        <div class="row" style="background-image: url('/image/Logo_DPRD_kota_Tangsel.png')">
            <table>
                <tr>
                    <td style="font-size:10px;" class="col-3">1. Nama Customer</td>
                    <td style="font-size:10px;" class="col">: {{$order->nama_perusahaan}}</td>
                </tr>
                <tr>
                    <td style="font-size:10px;" class="col-3">2. Alamat</td>
                    <td style="font-size:10px;" class="col">: {{$order->alamat_perusahaan}}</td>
                </tr>
                <tr>
                    <td style="font-size:10px;" class="col-3">3. Tlp/Fax</td>
                    <td style="font-size:10px;" class="col">: {{$order->telephone}}</td>
                </tr>
                <tr>
                    <td style="font-size:10px;" class="col-3">4. Personel yang dihubungi</td>
                    <td style="font-size:10px;" class="col">: {{$order->nama_pic}}</td>
                </tr>
                <tr>
                    <td style="font-size:10px;" class="col-3">5. Jenis Sampel</td>
                    <td style="font-size:10px;" class="col">: {{$order->layanan->jenis_sampel}}</td>
                </tr>
                <tr>
                    <td style="font-size:10px;" class="col-3">6. Identitas Sampel</td>
                    <td style="font-size:10px;" class="col">: {{$order->identitas_sampel}}</td>
                </tr>
                <tr>
                    <td style="font-size:10px;" class="col-3">7. Tanggal Penerimaan Sampel</td>
                    <td style="font-size:10px;" class="col">: {{date_format(date_create($order->tanggal_pengantaran), 'd F Y');}}</td>
                </tr>
                <tr>
                    <td style="font-size:10px;" class="col-3">8. Tanggal pengambilan Sampel</td>
                    <td style="font-size:10px;" class="col">: {{date_format(date_create($order->tanggal_pengambilan), 'd F Y');}}</td>
                </tr>
                <tr>
                    <td style="font-size:10px;" class="col-3">9. Lokasi Pengambilan Sampel</td>
                    <td style="font-size:10px;" class="col">: {{$order->alamat_pengambilan_sampel}}</td>
                </tr>
                <tr>
                    <td style="font-size:10px;" class="col-3">10. Acuan Pengambilan Sampel</td>
                    <td style="font-size:10px;" class="col">: {{$order->layanan->acuan_pengambilan_sampel}}</td>
                </tr>
                <tr>
                    <td style="font-size:10px;" class="col-3">11. Deskripsi Sampel</td>
                    <td style="font-size:10px;" class="col">: {{$order->layanan->nama_layanan}}</td>
                </tr>

            </table>
        </div>
        <div class="row  mt-3">
            <div class="col">


                <table class="table-pdf table table-bordered table-striped border">
                    <thead>
                        <th  style="font-size: 10px">No</th>
                        <th  style="font-size: 10px">Parameter</th>
                        <th  style="font-size: 10px">Satuan</th>
                        <th  style="font-size: 10px">Baku Mutu</th>
                        <th  style="font-size: 10px">Hasil Uji</th>
                        <th  style="font-size: 10px">Acuan Metoda</th>
                        <th  style="font-size: 10px">Keterangan</th>
                    </thead>
                    <tbody>
                        @php
                            $count =1;
                        @endphp
                        @foreach ($analisis as $item)
                        <tr >
                            {{-- {{dd($item)}} --}}
                            <td style="font-size: 10px">{{$count++}}</td>
                            <td style="font-size: 10px">{{$item->nama_pengujian}}</td>
                            <td style="font-size: 10px">{{$item->satuan}}</td>
                            <td style="font-size: 10px">{{$item->baku_mutu}}</td>
                            <td style="font-size: 10px">{{$item->hasil_uji}}</td>
                            <td style="font-size: 10px">{{$item->acuan_metoda_pengujian}}</td>
                            <td style="font-size: 10px">{{$item->keterangan}}</td>
                        </tr>
                            
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row mt-0">
        <div class="col">
            Catatan: 
            <table class="">
                <tr>
                    <td style="font-size: 10px">1. Hasil uji ini hanya berlaku untuk sampel yang diuji.</td>
                </tr>
                <tr>
                    <td style="font-size: 10px">2. SHU tidak boleh digandakan, kecuali secara lengkap dan seijin tertulis dari UPT Laboratorium Lingkungan Dinas Lingkungan Hidup</td>
                </tr>
                <tr>
                    <td style="font-size: 10px">3. Baku mutu berdasarkan Peraturan Menteri Lingkungan Hidup dan Kehutanan Republik Indonesia No. P.68/Menlhk/Setjen/Kum.1/8/2016 Tentang Baku Mutu Air Limbah Domestik Tersendiri.</td>
                </tr>
                <tr>
                    <td style="font-size: 10px">4. Laboratorium melayani pengaduan/komplain maksimum 1 (satu) minggu terhitung dari tanggal penyerahan SHU.</td>
                </tr>
                <tr>
                    <td style="font-size: 10px">5. Laboratorium melakukan pengambilan sampel.</td>
                    
                </tr>
            </table>
        </div>
    </div>
    <div class="row " style="margin-top: 30px">
        <div class="col-5 float-right text-center" style="font-size: 12px">
            Tangerang Selatan, {{date('d F Y')}}
            <br>
            Manager Teknis UPTD Laboratorium Lingkungan Dinas Lingkungan Hidup Kota Tangerang Selatan
            <br>
            @if ($order->status_pesanan == 'pengesahan_shu_selesai')

            <img src="{{public_path('/stempel/stempel.png')}}" width="150" style="float: left;margin-left:20px; margin-top: -80px" alt="" srcset="">
            <img class="pt-3 mb-3 mt-4 ml-5" src="{{public_path('images/ttd/'. $ttd)}}" style="padding-left: 40px" width="200"  alt="">
            @else 
            <br>
            <br>
            <br>
            @endif
            <br>
            <strong><u>{{"(" .$managerTeknis .")"}}</u></strong>
        </div>
    </div>
  

      <!-- Vendor JS Files -->  

      <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  
</body>
</html>