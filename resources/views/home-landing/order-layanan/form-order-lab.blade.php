@extends('home-landing.master')
@section('content')

@include('home-landing.order-layanan.banner')
    <div class="container">
        <div class="row">
            <div class="col">
                <p class="lead text-center text-lg-justify"><strong>UPTD Laboratorium Lingkungan Kota Tangerang Selatan</strong> juga melayani apabila pelanggan ingin langsung membawa contoh uji ke laboratorium kami dengan persyaratan tertentu yang harus dipatuhi.</p>
            </div>
        </div>
        <div class="row mb-5">
            <p class="display-6 my-5 text-center"><strong>FORMULIR PERMINTAAN UJI LABORATORIUM</strong></p>
            <div class="col border-form rounded p-5">
                <form onsubmit="return submitOrderLab()" method="POST" action="{{route('order.lab.create')}}">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-12 col-lg-6 mb-3 mb-lg-5 order-1 order-lg-1">
                            <label for="nama_perusahaan">Nama Perusahaan</label>
                            <input type="text" id="nama_perusahaan" onkeyup="removeError()" name="nama_perusahaan" class="form-control">
                            <div class="font-italic text-danger d-none" id="errorNamaPerusahaan">
                                Mohon masukkan nama perusahaan!
                              </div>
                        </div>
                        <div class="col-12 col-lg-6 mb-3 mb-lg-5 order-3 order-lg-2">
                            <label for="no_pic">No Kontak/WA PIC</label>
                            <input type="text" id="no_pic" name="no_pic" class="form-control" oninput="validatePhoneNumber(event)">
                            <div class="font-italic text-danger d-none" id="errorNoPic">
                                Mohon masukkan kontak/wa PIC!
                              </div>                      
                        </div>
                        <div class="col-12 col-lg-6 mb-3 mb-lg-5 order-2 order-lg-3">
                            <label for="alamat_perusahaan">Alamat Perusahaan</label>
                            <input type="text" id="alamat_perusahaan" name="alamat_perusahaan" class="form-control">
                            <div class="font-italic text-danger d-none" id="errorAlamatPerusahaan">
                                Mohon masukkan alamat perusahaan!
                            </div>   
                        </div>
                        <div class="col-12 col-lg-6 mb-3 mb-lg-5 order-4 order-lg-4">
                            <label for="email_pic">Alamat Email PIC</label>
                            <input type="text" id="email_pic" name="email_pic" class="form-control">     
                            <div class="font-italic text-danger d-none" id="errorEmailPic">
                                Mohon masukkan alamat email PIC!
                            </div>                 
                        </div>
                        <div class="col-12 col-lg-6 mb-3 mb-lg-5 order-5 order-lg-5">
                            <label for="telephone">Telephone/Fax Perusahaan</label>
                            <input type="text" id="telephone" name="telephone" class="form-control" oninput="validatePhoneNumber(event)">       
                            <div class="font-italic text-danger d-none" id="errorTelephone">
                                Mohon masukkan no telephone atau fax perusahaan!
                            </div>                 
                        </div>
                        <div class="col-12 col-lg-6 mb-3 mb-lg-5 order-7 order-lg-6">
                            <label for="layanan_id">Layanan yang Diinginkan</label>
                            <select  onchange="removeErrorOption()" class="form-select  border-input" name="layanan_id" id="layanan_id">
                                <option value="">Pilih Layanan</option>
                                @foreach ($services as $service)
                                    <option value="{{$service->id}}">{{$service->nama_layanan}}</option>                                    
                                @endforeach

                              </select>   
                              <div class="font-italic text-danger d-none" id="errorLayanan">
                                Mohon masukkan layanan!
                            </div>                    
                        </div>
                        <div id="formJenisPesanan" class="col-12 col-lg-6 mb-3 mb-lg-5 order-8 order-lg-8">
                            <label for="jenis_pesanan">Jenis Pesanan</label>
                            <select disabled onchange="removeErrorOption()" class="form-select  border-input" name="jenis_pesanan" id="jenis_pesanan">
                                <option value="">Pilih Jenis Pesanan</option>
                                <option value="paket">Paket</option>
                                <option value="satuan">Satuan</option>
                               
                              </select>   
                              <div class="font-italic text-danger d-none" id="errorJenisPesanan">
                                Mohon masukkan jenis pesanan!
                            </div>                    
                        </div>
                        <div class="col-12 col-lg-6 mb-3 mb-lg-5 order-6 order-lg-7">
                            <label for="nama_pic">Nama PIC Yang bisa dihubungi</label>
                            <input  onkeyup="removeError()" type="text" id="nama_pic" name="nama_pic" class="form-control">  
                            <div class="font-italic text-danger d-none" id="errorNamaPic">
                                Mohon masukkan nama PIC!
                            </div>                      
                        </div>
                        <div class="col-12 col-lg-6 mb-3 mb-lg-5 order-8 order-lg-8">
                            <label for="tanggal_pengantaran">Tanggal Pengantaran Contoh Uji</label>
                            <input type="datetime-local" onkeyup="removeError()" id="tanggal_pengantaran" name="tanggal_pengantaran" class="form-control tanggal_pengantaran">   
                            <div class="font-italic text-danger d-none" id="errorTanggalPengantaran">
                                Mohon masukkan tanggal pengantaran!
                            </div>                     
                        </div>
                        {{-- <div class="col-12 col-lg-6 mb-3 mb-lg-5 order-9 order-lg-9">
                            <label for="jumlah_sampel">Jumlah Sampel</label>
                            <input type="text" id="jumlah_sampel" name="jumlah_sampel" class="form-control">  
                            <div class="font-italic text-danger d-none" id="errorJumlahSampel">
                                Mohon masukkan jumlah sampel!
                            </div>                     
                        </div> --}}
                        <div class="col-12 col-lg-6 mb-3 mb-lg-5 order-10 order-lg-10">
                            <label for="volume_uji_coba">Volume Contoh uji yang akan dibawa</label>
                            <select  onchange="removeErrorOptionVolume()" class="form-select" name="volume_uji_coba" id="volume_uji_coba">
                                <option value="">Pilih Volume</option>
                                <option value="1000 ml">1000 ml</option>
                                <option value="1500 ml">1500 ml</option>
                                <option value="2000 ml">2000 ml</option>
                            </select>          
                            <div class="font-italic text-danger d-none" id="errorVolumeUjiCoba">
                                Mohon masukkan volume uji coba!
                            </div>             
                        </div>
                        {{-- <div class="col-12 col-lg-6 mb-3 mb-lg-3 order-11 order-lg-11">
                            <label for="volume_uji_coba">Alamat Pengambilan Sampel / Links Gmaps</label>
                            <input type="text" id="alamat_pengambilan_sampel" name="alamat_pengambilan_sampel" class="form-control">  
                            <div class="font-italic text-danger d-none" id="errorAlamatPengambilanSampel">
                                Mohon masukkan alamat pengambilan sampel!
                            </div> 
                            <div class="mt-3">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.5186850492264!2d106.67110977499124!3d-6.326763693662758!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e4e05772991d%3A0x6213168cd4528a62!2sUPT%20Laboratorium%20Lingkungan%20DLH%20Kota%20Tangerang%20Selatan!5e0!3m2!1sid!2sid!4v1694146180841!5m2!1sid!2sid" width="100%" height="290px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>            
                        </div> --}}

                    </div>
                    <button type="submit" class="float-lg-end mr-5 btn button-custom"> Kirim Permintaan </button>
                    {{-- <div class="row"> --}}
                    {{-- </div> --}}
                  </form>
            </div>
        </div>
    </div>
    <script>
        function validatePhoneNumber(event) {
        // Mendapatkan nilai input
        let input = event.target.value;

        // Menghapus karakter non-angka
        let numericInput = input.replace(/\D/g, '');

        // Memastikan panjang maksimal adalah 12 digit
        if (numericInput.length > 12) {
            numericInput = numericInput.slice(0, 12);
        }

        // Menetapkan nilai input yang telah divalidasi
        event.target.value = numericInput;
        }

    </script>
    <script src="/js/formPesanan.js"></script>
    {{-- <script>
        $( document ).ready(function() {
            if ($(".tanggal_pengantaran").length) 
      {
        $('.tanggal_pengantaran').daterangepicker({
        //   locale: date_picker_locale,
          autoUpdateInput: false,
          singleDatePicker: true,
          timePicker: true,
            timePicker24Hour: true,
    
        });
        $('.tanggal_pengantaran').on('apply.daterangepicker', function(ev, picker) {
    

          $('#tanggal_pengantaran').val(picker.startDate.format('YYYY-MM-DD HH:mm'));
        });
        }
    
        });
    </script> --}}

@endsection