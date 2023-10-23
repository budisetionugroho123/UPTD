@extends('home-landing.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center mb-5 mt-5">
            <div class="pt-4 pb-2 mb-2">
                <h5 class="card-title text-center pb-0 fs-4">Login Customer</h5>
            </div>

            <form class="row g-3 needs-validation" method="post" action="{{route('login.customer.store')}}" novalidate>
                @csrf
                <div class="col-12">
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="email" name="email" autocomplete="off" class="form-control" id="email" required >
                    </div>
                </div>

                <div class="col-12">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                </div>

                <div class="col-12">
                <button class="btn btn-primary w-100" type="submit">Masuk</button>
                </div>
                <div class="col-12">
                    <p class="small custom-button mb-0 text-center"> <a href="#" data-toggle="modal" data-target="#lupasPasswordModal">Lupa password?</a></p>
                </div>
                <div class="col-12">
                    <p class="small custom-button mb-0 text-center">Belum punya akun? <a href="{{route('register.customer')}}">Daftar Akun</a></p>
                </div>
            </form>
        </div>
    </div>
    <!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="lupasPasswordModal" tabindex="-1" role="dialog" aria-labelledby="lupasPasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered"  role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="lupasPasswordModalLabel">Lupa Password</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('lupa.password')}}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <input type="email" required name="email" class="form-control" id="exampleInputEmail1"  placeholder="Masukkan email....">
                    <div class="invalid-feedback">
                        Mohon masukkan email
                      </div>
                </div>              
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
        </form>

      </div>
    </div>
  </div>
@endsection