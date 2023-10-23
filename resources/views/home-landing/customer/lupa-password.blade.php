@extends('home-landing.master')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center mb-5 mt-5">
        <div class="pt-4 pb-2 mb-2">
            <h5 class="card-title text-center pb-0 fs-4">Lupa Password</h5>
        </div>

        <form class="row g-3 needs-validation" method="post" action="{{route('new.password')}}"  onsubmit="return submitPasswordBaru()">
            @csrf
            <input type="hidden" name="email" value="{{$email}}">
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
    function submitPasswordBaru () {
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