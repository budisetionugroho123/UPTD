@extends('auth.master')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

      <div class="d-flex justify-content-center py-4">
        <a href="index.html" class="logo d-flex align-items-center w-auto">
          <img src="/image/Logo_DPRD_kota_Tangsel.png" alt="">
          <span class="d-none d-lg-block">UPTD</span>
        </a>
      </div><!-- End Logo -->

      <div class="card mb-3">

        <div class="card-body">

          <div class="pt-4 pb-2">
            <h5 class="card-title text-center pb-0 fs-4">Masuk</h5>
          </div>

          <form class="row g-3 needs-validation" method="post" action="{{route('login.auth')}}" novalidate>
            @csrf
            <div class="col-12">
                <label for="email" class="form-label">Email</label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                    <input type="email" name="email" autocomplete="off" class="form-control" id="email" required >
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        Mohon gunakan format email yang valid.
                    </div>
                </div>
            </div>

            <div class="col-12">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" required>
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        Masukkan password.
                </div>
            </div>

            <div class="col-12">
              <button class="btn btn-primary w-100" type="submit">Masuk</button>
            </div>
            <div class="col-12">
              <p class="small custom-button mb-0"> <a href="pages-register.html">Lupa password?</a></p>
            </div>
          </form>

        </div>
      </div>

     
    </div>
  </div>
  <script src="">
    
  </script>
@endsection