@extends('layouts.master')
@section('content')
    <div class="container bg-white">
        <div class="row justify-content-center">
            <div class="col-lg-10 m-5">
              {{-- @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible">
                    <a  href="#" class="close float-end " data-bs-dismiss="alert" aria-label="close">&times;</a>
                    {{ session('message') }}
                </div>
                  
              @endif --}}
                <form action="{{route('edit.layanan')}}" method="post" onsubmit="return submitEditLayanan()">
                    @csrf
                    <input type="hidden" name="id" value="{{$data['layanan']['id']}}">
                        <div class="form-group row mb-3">
                        <label for="nama_layanan" class="col-sm-2 col-form-label">Nama Layanan</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_layanan" class="form-control" id="nama_layanan" value="{{old('nama_layanan', $data['layanan']['nama_layanan'])}}" >
                            <small id="errorNamaLayanan" class="text-danger text-italic d-none">Mohon masukkan nama layanan</small>
                        </div>
                        </div>
                        <div class="form-group row mb-3">
                        <label for="jenis_sampel" class="col-sm-2 col-form-label">Jenis Sampel</label>
                        <div class="col-sm-10">
                            <input type="text" name="jenis_sampel" class="form-control" id="jenis_sampel" value="{{old('jenis_sampel', $data['layanan']['jenis_sampel'])}}" >
                            <small id="errorJenisSampel" class="text-danger text-italic d-none">Mohon masukkan jenis sampel</small>
                        </div>
                        </div>
                        <div class="form-group row mb-3">
                        <label for="identitas_layanan" class="col-sm-2 col-form-label">Identitas Layanan</label>
                        <div class="col-sm-10">
                            <input type="text" name="identitas_layanan" class="form-control" id="identitas_layanan" value="{{old('identitas_layanan', $data['layanan']['identitas_layanan'])}}" >
                            <small id="errorIdentitasLayanan" class="text-danger text-italic d-none">Mohon masukkan identitas layanan</small>
                        </div>
                        </div>
                        <div class="form-group row mb-3">
                        <label for="acuan_pengambilan_sampel" class="col-sm-2 col-form-label">Acuan Sampel</label>
                        <div class="col-sm-10">
                            <input type="text" name="acuan_pengambilan_sampel" class="form-control" id="acuan_pengambilan_sampel" value="{{old('acuan_pengambilan_sampel', $data['layanan']['acuan_pengambilan_sampel'])}}" >
                            <small id="errorAcuan" class="text-danger text-italic d-none">Mohon masukkan acuan pengambilan sampel</small>
                        </div>
                        </div>
                        <div class="form-group row mb-3">
                        <label for="antarLab" class="col-sm-2 col-form-label">Diizinkan Antar Ke Lab</label>
                        <div class="col-sm-10">
                            <select name="antar_lab" id="antar_lab" class="form-select" >
                            <option value="{{$data['layanan']['antar_lab']}}">{{$data['layanan']['antar_lab'] == true ? 'Diizinkan' : "Tidak Diizinkan"}}</option>                          <option value="1">Diizinkan</option>
                            <option value="0">Tidak Diizinkan</option>
                            </select>
                            <small id="errorAntarLab" class="text-danger text-italic d-none">Mohon pilih untuk perizinan antar ke lab</small>
                        </div>
                        </div>
                        <div class="form-group row mb-3">
                        <label for="datang_ke_lokasi" class="col-sm-2 col-form-label">Datang Ke Lokasi Pengambilan Sampel</label>
                        <div class="col-sm-10">
                            <select name="datang_ke_lokasi" id="datang_ke_lokasi" class="form-select" >
                            <option value="{{$data['layanan']['datang_ke_lokasi']}}">{{$data['layanan']['datang_ke_lokasi'] == true ? 'Diizinkan' : "Tidak Diizinkan"}}</option>
                            <option value="1">Diizinkan</option>
                            <option value="0">Tidak Diizinkan</option>
                            </select>
                            <small id="errorLokasi" class="text-danger text-italic d-none">Mohon pilih untuk perizinan datang ke lokasi pengambilan sampel</small>
                        </div>
                        </div>
                        <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Ubah</button>
                        </div>
                        </div>
                  </form>
            </div>
        </div>
    </div>
    <div class="container bg-white mt-5">

        <div class="row justify-content-center">
            <div class="col-lg-10 m-5">
                <h3 class="mb-3">Paramater Pengujian</h3>
                <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddParameter"  onclick="tambahParameter()" class="btn btn-primary mb-3"> <i class="fas fa-plus"></i> Tambah Parameter Pengujian</a>
                <table class="table border" id="table">
                    <thead>
                        <th>No</th>
                        <th>uuid</th>
                        <th>Pengujian</th>
                        <th>Metode</th>
                        <th>Baku Mutu</th>
                        <th>Satuan</th>
                        <th>Acuan Metode</th>
                        <th >Tarif</th>
                        <th>Tindakan</th>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach ($data['layanan']['parameters'] as $item)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$item->uuid}}</td>
                                <td>
                                    {{$item->nama_pengujian}}
                                </td>
                                <td>{{$item->metode}}</td>
                                <td>{{$item->baku_mutu}}</td>
                                <td>{{$item->satuan}}</td>
                                <td>{{$item->acuan_metoda_pengujian}}</td>
                                <td>{{"RP " .number_format($item->tarif,2,',','.');}}</td>
                                <td class="text-center">
                                    <a href="" data-bs-toggle="modal" data-bs-target="#modalAddParameter" onclick="updateParameter('{{$item->id}}')"><i class="fas fa-pen text-success"></i></a>
                                    <a data-bs-toggle="modal" data-bs-target="#modalDeleteParameter" href="" onclick="deleteParameter('{{$item->id}}')"><i class="fas fa-trash text-danger"></i></a>
                                </td>
                            </tr>
                            
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

  
    <!-- Modal -->
    <div class="modal fade" id="modalAddParameter" tabindex="-1" role="dialog" aria-labelledby="modalAddParameterLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="modalAddParameterLabel">Modal title</h5>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form id="form-pengujian-parameter" method="post" onsubmit="return createParameter()" >
                @csrf
                  <div class="modal-body">
                    <input type="hidden"  name="layanan_id" value="{{$data['layanan']['id']}}">
                    <div class="form-group row mb-3">
                        <div class="col-sm-12">
                          <input type="text" name="nama_pengujian" class="form-control" id="input_namapengujian" placeholder="masukkan parameter pengujian"  >
                        </div>
                        <small id="errorNamaPengujian" class="text-danger d-none font-italic">Masukkan nama pengujian*</small>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-sm-12">
                          <input type="text" name="satuan" class="form-control" id="input_satuan" placeholder="masukkan satuan"  >
                        </div>
                        <small id="errorSatuan" class="text-danger d-none font-italic">Masukkan satuan*</small>
                      </div>
                    <div class="form-group row mb-3">
                        <div class="col-sm-12">
                          <input type="text" name="metode" class="form-control" id="input_metode" placeholder="masukkan metode"  >
                        </div>
                        <small id="errorMetode" class="text-danger d-none font-italic">Masukkan metode*</small>

                      </div>

                    <div class="form-group row mb-3">
                        <div class="col-sm-12">
                          <input type="text" name="baku_mutu" class="form-control" id="input_bakumutu" placeholder="masukkan baku mutu"  >
                        </div>
                        <small id="errorBakuMutu" class="text-danger d-none font-italic">Masukkan baku mutu*</small>

                      </div>
                    <div class="form-group row mb-3">
                        <div class="col-sm-12">
                          <input type="text" name="acuan_metoda_pengujian" class="form-control" id="input_acuan_metoda_pengujian" placeholder="masukkan acuan metode pengujian"  >
                        </div>
                        <small id="errorAcuan" class="text-danger d-none font-italic">Masukkan acuan metode pengujian*</small>

                      </div>
                    <div class="form-group row mb-3">
                        <div class="col-sm-12">
                          <input type="number" name="tarif" class="form-control" id="input_tarif" placeholder="masukkan tarif"  >
                        </div>
                        <small id="errorTarif" class="text-danger d-none font-italic">Masukkan tarif*</small>

                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                      <button type="submit" id="buttonModal" class="btn btn-primary">Save changes</button>
                    </div>
                  </form>
        </div>
        </div>
    </div>

    @include('layanan.modal-delete-parameter')
    {{-- @error('nama_pengujian')
    <script type="text/javascript">
        $( document ).ready(function() {
             $('#modalAddParameter').modal('show');
        });
    </script>
    @enderror  --}}
    <script src="/js/parameter.js"></script>
    <script>
       function submitEditLayanan () {
            var nama_layanan= $("#nama_layanan").val();
            if(nama_layanan == ""){
                $("#errorNamaLayanan").removeClass('d-none')
                return false;
            }else {
                $("#errorNamaLayanan").addClass('d-none')
            }
            var jenis_sampel= $("#jenis_sampel").val();
            if(jenis_sampel == ""){
                $("#errorJenisSampel").removeClass('d-none')
                return false;
            }else {
                $("#errorJenisSampel").addClass('d-none')
            }
            var identitas_layanan= $("#identitas_layanan").val();
            if(identitas_layanan == ""){
                $("#errorIdentitasLayanan").removeClass('d-none')
                return false;
            }else {
                $("#errorIdentitasLayanan").addClass('d-none')
            }
            var acuan_pengambilan_sampel= $("#acuan_pengambilan_sampel").val();
            if(acuan_pengambilan_sampel == ""){
                $("#errorAcuan").removeClass('d-none')
                return false;
            }else {
                $("#errorAcuan").addClass('d-none')
            }

           
        }    
    </script>
    <script>
        function tambahParameter(){
            var parameter_pengujian = $("#input_namapengujian").val("");
            var satuan = $("#input_satuan").val("");
            var metode = $("#input_metode").val("");
            var bakumutu = $("#input_bakumutu").val("");
            var acuan = $("#input_acuan_metoda_pengujian").val("");
            var tarif = $("#input_tarif").val("");
            var idPengujian = $("#id_pengujian").remove();
            var title = $("#modalAddParameterLabel").text("Tambah Layanan");
            $('#form-pengujian-parameter').attr('action', '{{route("add.parameter.store")}}')

            $button = $("#buttonModal").text('Simpan');
        }
        function deleteParameter(id) {
          var element = `
                <input type="hidden" name="id" id="id" value= "${id}">
                `;
          var form = $("#form-delete-parameter");
          form.append(element);
        }
        function updateParameter(id){
            
            var title = $("#modalAddParameterLabel").text("Ubah Layanan");
            var button = $("#buttonModal").text("Simpan");
            var form = $('#form-pengujian-parameter');
            $.ajax({
              type:"GET",
              url: "/layanan/get-parameter/"+ id,
              dataType: 'json',
              success: function(data){
                var parameter_pengujian = $("#input_namapengujian").val(data['parameter']['nama_pengujian']);
                var satuan = $("#input_satuan").val(data['parameter']['satuan']);
                var metode = $("#input_metode").val(data['parameter']['metode']);
                var bakumutu = $("#input_bakumutu").val(data['parameter']['baku_mutu']);
                var acuan = $("#input_acuan_metoda_pengujian").val(data['parameter']['acuan_metoda_pengujian']);
                var tarif = $("#input_tarif").val(data['parameter']['tarif']);
                var element = `
                <input type="hidden" name="id" id="id_pengujian" value= "${data['parameter']['id']}">
                `
                form.append(element);
                $('#form-pengujian-parameter').attr('action', '{{route("update.parameter")}}')

                }
            })
        }
        
    </script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    @if ($errors->has('nama_pengujian')) 
    {{-- @error('nama_pengujian')
    {{$message}}
    @enderror --}}
    <script type="text/javascript">
        $(window).load(function(){
          $('#modalAddParameter').modal('show');
          });
    </script>
    @endif
@endsection