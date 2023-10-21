@extends('home-landing.master')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center mb-5 mt-5">
        <div class="pt-4 pb-2 mb-2">
            <h5 class="card-title text-center pb-0 fs-4">Akun</h5>
        </div>

        <form class="row g-3 needs-validation" method="post" action="{{route('customer.profil.edit')}}" novalidate>
            @csrf
            <input type="hidden" name="id" value="{{$user->id}}">
            <div class="col-12">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" required value="{{$user->name}}">
            </div>
            <div class="col-12">
                <label for="email" class="form-label">Email</label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                    <input type="email" name="email" autocomplete="off" required value="{{$user->email}}" class="form-control" id="email" required >
                  
                </div>
            </div>
            <div class="col-12">
                <label for="no_hp" class="form-label">No Hp</label>
                <input type="text" name="no_hp" class="form-control" required value="{{$user->no_hp}}" id="no_hp" required>
            </div>
            {{-- <div class="col-12">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div> --}}


            <div class="col-12">
            <button class="btn btn-primary w-100" type="submit">Simpan</button>
            </div>
            
        </form>
    </div>
    {{-- ganti password --}}
    <div class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center mb-5 mt-5">
        <div class="pt-4 pb-2 mb-2">
            <h5 class="card-title text-center pb-0 fs-4">Ganti Password</h5>
        </div>

        <form class="row g-3 needs-validation" method="post" action="{{route('customer.ganti.password')}}"  onsubmit="return submitEditPassword()">
            @csrf
            <input type="hidden" name="id" value="{{auth()->user()->id}}">
            <div class="col-12">
                <label for="passwordlama" class="form-label">Password Sekarang</label>
                <input  type="password" placeholder="******" name="passwordlama" class="form-control" id="passwordlama"  >
                <small id="errorpasswordlama" class="text-danger text-italic d-none">Mohon masukkan password</small>
            </div>
            <div class="col-12">
                <label for="password" class="form-label">Password Baru</label>
                <input   type="password" placeholder="******" name="password" class="form-control" id="password"  >
                <small id="errorPassword" class="text-danger text-italic d-none">Mohon masukkan password</small>

            </div>
            <div class="col-12">
                <label for="konfirmasiPassword" class="form-label">Konfirmasi Password</label>
                <input  type="password" placeholder="******" name="konfirmasiPassword" class="form-control" id="konfirmasiPassword"   onkeyup="checkPassword()">
                <small id="errorKonfirmasiPassword" class="text-danger text-italic d-none"></small>
                <small id="errorCheckKonfirmasi" class="text-danger text-italic d-none">Password konfirmasi tidak sesuai</small>
                
            </div>
            <div class="col-12">
            <button class="btn btn-primary w-100" type="submit">Ganti Password</button>
            </div>
            
        </form>
    </div>
</div>
<script>
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