@extends('layouts.master')
@section('content')
<div class="container bg-white">
<div class="row">
    <div class="col-10 m-5">
        <h3 class="d-5 mb-5">Detail Pengguna</h3>
        <form action="{{route('role.edit.store')}}" enctype="multipart/form-data"  onsubmit="return submitEditUser()" method="post">
            @method('PUT')
            @csrf
                <input type="hidden" name="id" value="{{$user->id}}">
                <div class="row justify-content-center mb-3">
                    <div class="col-12 text-center">
                        @if (is_null($user->photo))
                            <img id="image-photo" class="border rounded-circle border-primary" src="/image/profil.png" style="width: 150px; height: 150px;"  alt="aa">
                        @else
                            <img id="image-photo" class="border rounded-circle border-primary" src="/images/photo/{{$user->photo}}" style="width: 150px; height: 150px;"  alt="aa">
                        @endif
                    </div>
                    <div class="col-12 text-center">
                        <input type="file" class="ml-5" name="photo" id="photo" >
                        @error('photo')
                            <p class="text-danger text-italic"><small> {{$message}}</small> </p>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Nama Pengguna</label>
                    <div class="col-sm-10">
                    <input type="text" name="name" value="{{old('name', $user->name)}}" class="form-control" id="name"  >
                    <small id="errorName" class="text-danger text-italic d-none">Mohon masukkan nama pengguna</small>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                    <input type="email" value="{{old('email', $user->email)}}" name="email" class="form-control" id="email"  >
                    <small id="errorEmail" class="text-danger text-italic d-none">Mohon masukkan email</small>
                    @error('email')
                            <small id="errorEmail" class="text-danger text-italic d-none">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="no_hp" class="col-sm-2 col-form-label">No Hp</label>
                    <div class="col-sm-10">
                    <input type="text" name="no_hp" class="form-control" id="no_hp" value="{{old('no_hp', $user->no_hp)}}"  >
                    <small id="errorNoHp" class="text-danger text-italic d-none">Mohon masukkan no hp</small>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="role" class="col-sm-2 col-form-label">Role</label>
                    <div class="col-sm-10">
                    <select class="form-select" id="role" name="role">
                        <option value="{{$user->role}}">{{$user->role_label}}</option>
                        @if (auth()->user()->role == 'manager_teknis')

                            @foreach ($roles as $role)
                            <option value="{{$role->role}}">{{$role->label}}</option>
                            @endforeach
                        @endif
                    </select>
                    <small id="errorRole" class="text-danger text-italic d-none">Mohon pilih role</small>
                    </div>
                </div>
                @if ($user->role == "manager_teknis")
                    <div class="form-group row mb-3">
                        <label for="ttd" class="col-sm-2 col-form-label">TTD Pengesahan</label>
                        <div class="col-sm-10">
                            <input type="file" name="ttd" class="form-control" id="ttd"  >
                            {{-- <small id="errorNoHp" class="text-danger text-italic d-none">Mohon masukkan no hp</small> --}}
                        </div>
                        <a href="/images/ttd/{{$user->ttd}}" target="_blank">Klik untuk melihat ttd</a>
                    </div>
                
                @endif

              <div class="form-group row">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
              </div>
        </form>
    </div>
    
</div>
</div>
<div class="bg-white container mt-5">
    <div class="row">
        <div class="col-10 m-5">
            <h3 class="d-5 mb-5">Ubah Password</h3>
            <form action="{{route('role.edit.password')}}" method="post" onsubmit="return submitEditPassword()">
                @method('put')
                @csrf
                <input type="hidden" name="id" value="{{$user->id}}">
                  <div class="form-group row mb-3">
                    <label for="passwordlama" class="col-sm-2 col-form-label">Password Lama</label>
                    <div class="col-sm-10">
                      <input  type="password" placeholder="******" name="passwordlama" class="form-control" id="passwordlama"  >
                      <small id="errorpasswordlama" class="text-danger text-italic d-none">Mohon masukkan password</small>
                    </div>
                  </div>
                  <div class="form-group row mb-3">
                    <label for="password" class="col-sm-2 col-form-label">Password Baru</label>
                    <div class="col-sm-10">
                      <input   type="password" placeholder="******" name="password" class="form-control" id="password"  >
                      <small id="errorPassword" class="text-danger text-italic d-none">Mohon masukkan password</small>
                    </div>
                  </div>
                  <div class="form-group row mb-3">
                    <label for="konfirmasiPassword" class="col-sm-2 col-form-label">Konfirmasi Password</label>
                    <div class="col-sm-10">
                      <input  type="password" placeholder="******" name="konfirmasiPassword" class="form-control" id="konfirmasiPassword"   onkeyup="checkPassword()">
                      <small id="errorKonfirmasiPassword" class="text-danger text-italic d-none"></small>
                      <small id="errorCheckKonfirmasi" class="text-danger text-italic d-none">Password konfirmasi tidak sesuai</small>
                    </div>
                  </div>
                 
                  <div class="form-group row">
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-primary">Ubah Password</button>
                    </div>
                  </div>
            </form>
        </div>
</div>
</div>
<script>
    function changePhoto(){
        var log = $("#photo").val();
        console.log(log);
        var textSplit = log.split("\\");
        console.log(textSplit[textSplit.length-1]);
        $("#image-photo").attr('src', '/image/' + textSplit[textSplit.length-1]);
    }
</script>
<script>
    function submitEditUser(){
        var name= $("#name").val();
        if(name == ""){
            $("#errorName").removeClass('d-none')
            return false;
        }else {
            $("#errorName").addClass('d-none')

        }
        var email= $("#email").val();
        if(email == ""){
            $("#errorEmail").removeClass('d-none')
            return false;
        }else {
            $("#errorEmail").addClass('d-none')

        }
    
        var no_hp= $("#no_hp").val();
        if(no_hp == ""){
            $("#errorNoHp").removeClass('d-none')
            return false;
        }else {
            $("#errorNoHp").addClass('d-none')

        }
        var role= $("#role").val();
        if(role == ""){
            $("#errorRole").removeClass('d-none')
            return false;
        }else {
            $("#errorRole").addClass('d-none')

        }
    }
    function submitEditPassword () {
        var passwordlama= $("#passwordlama").val();
        if(passwordlama == ""){
            $("#errorpasswordlama").removeClass('d-none')
            return false;
        }else {
            $("#errorpasswordlama").addClass('d-none')

        }
        var password= $("#password").val();
        if(password == ""){
            $("#errorPassword").removeClass('d-none')
            return false;
        }else {
            $("#errorPassword").addClass('d-none')

        }
        var konfirmasiPassword= $("#konfirmasiPassword").val();
        if(konfirmasiPassword == ""){
            $("#errorCheckKonfirmasi").addClass('d-none')
            $("#errorKonfirmasiPassword").removeClass('d-none')
            $("#errorKonfirmasiPassword").append("mohon masukkan konfirmasi password")
            
            return false;
        }else {
            $("#errorKonfirmasiPassword").addClass('d-none')

        }
    }
    function checkPassword(){
        var password= $("#password").val();
        var konfirmasiPassword= $("#konfirmasiPassword").val();
        if(password != konfirmasiPassword) {
            $("#errorKonfirmasiPassword").addClass('d-none')
            $("#errorCheckKonfirmasi").removeClass('d-none')

        }else {
            $("#errorCheckKonfirmasi").addClass('d-none')
        }

    }
</script>
@endsection