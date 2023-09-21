@extends('layouts.master')
@section('content')
    <div class="container bg-white">
        <div class="row">
            <div class="col-10 m-5">
                <form action="{{route('add.layanan')}}" method="post" onsubmit="return submitAddLayanan()">
                    @csrf
                      <div class="form-group row mb-3">
                        <label for="nama_layanan" class="col-sm-2 col-form-label">Nama Layanan</label>
                        <div class="col-sm-10">
                          <input type="text" name="nama_layanan" class="form-control" id="nama_layanan"  >
                          <small id="errorNamaLayanan" class="text-danger text-italic d-none">Mohon masukkan nama layanan</small>
                        </div>
                      </div>
                      <div class="form-group row mb-3">
                        <label for="jenis_sampel" class="col-sm-2 col-form-label">Jenis Sampel</label>
                        <div class="col-sm-10">
                          <input type="text" name="jenis_sampel" class="form-control" id="jenis_sampel"  >
                          <small id="errorJenisSampel" class="text-danger text-italic d-none">Mohon masukkan jenis sampel</small>
                        </div>
                      </div>
                      <div class="form-group row mb-3">
                        <label for="identitas_layanan" class="col-sm-2 col-form-label">Identitas Layanan</label>
                        <div class="col-sm-10">
                          <input type="text" name="identitas_layanan" class="form-control" id="identitas_layanan" placeholder="Ex : A.B/A.L/U.P"  >
                          <small id="errorIdentitasLayanan" class="text-danger text-italic d-none">Mohon masukkan identitas layanan</small>
                        </div>
                      </div>
                      <div class="form-group row mb-3">
                        <label for="acuan_pengambilan_sampel" class="col-sm-2 col-form-label">Acuan Sampel</label>
                        <div class="col-sm-10">
                          <input type="text" name="acuan_pengambilan_sampel" class="form-control" id="acuan_pengambilan_sampel"  >
                          <small id="errorAcuan" class="text-danger text-italic d-none">Mohon masukkan acuan pengambilan sampel</small>
                        </div>
                      </div>
                      <div class="form-group row mb-3">
                        <label for="antarLab" class="col-sm-2 col-form-label">Diizinkan Antar Ke Lab</label>
                        <div class="col-sm-10">
                          <select name="antar_lab" id="antar_lab" class="form-select" >
                            <option value="">Pilih</option>
                            <option value="1">Diizinkan</option>
                            <option value="0">Tidak Diizinkan</option>
                          </select>
                          <small id="errorAntarLab" class="text-danger text-italic d-none">Mohon pilih untuk perizinan antar ke lab</small>
                        </div>
                      </div>
                      <div class="form-group row mb-3">
                        <label for="datang_ke_lokasi" class="col-sm-2 col-form-label">Datang Ke Lokasi Pengambilan Sampel</label>
                        <div class="col-sm-10">
                          <select name="datang_ke_lokasi" id="datang_ke_lokasi" class="form-select" >
                            <option value="">Pilih</option>
                            <option value="1">Diizinkan</option>
                            <option value="0">Tidak Diizinkan</option>
                          </select>
                          <small id="errorLokasi" class="text-danger text-italic d-none">Mohon pilih untuk perizinan datang ke lokasi pengambilan sampel</small>
                        </div>
                      </div>
  
                      <div class="form-group row">
                        <div class="col-sm-10">
                          <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                      </div>
                </form>
            </div>
        </div>
    </div>
    <script >
    function submitAddLayanan () {
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
            var antar_lab= $("#antar_lab").val();
            if(antar_lab == ""){
                $("#errorAntarLab").removeClass('d-none')
                return false;
            }else {
                $("#errorAntarLab").addClass('d-none')
            }
            var datang_ke_lokasi= $("#datang_ke_lokasi").val();
            if(datang_ke_lokasi == ""){
                $("#errorLokasi").removeClass('d-none')
                return false;
            }else {
                $("#errorLokasi").addClass('d-none')
            }
           
        }    
    </script>
@endsection