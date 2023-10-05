@extends('home-landing.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center mb-5 mt-5">
            <div class="pt-4 pb-2 mb-2">
                <h5 class="card-title text-center pb-0 fs-4">Daftar Customer</h5>
            </div>

            <form class="row g-3 needs-validation" method="post" action="{{route('register.customer.store')}}" novalidate>
                @csrf
                <div class="col-12">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" required>

                </div>
                <div class="col-12">
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="email" name="email" autocomplete="off" class="form-control" id="email" required >
                      
                    </div>
                </div>
                <div class="col-12">
                    <label for="no_hp" class="form-label">No Hp</label>
                    <input type="text" name="no_hp" class="form-control" id="no_hp" required>
                </div>
                <div class="col-12">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                </div>


                <div class="col-12">
                <button class="btn btn-primary w-100" type="submit">Masuk</button>
                </div>
                <div class="col-12">
                    <p class="small custom-button mb-0 text-center"> <a href="pages-register.html">Lupa password?</a></p>
                </div>
                <div class="col-12">
                    <p class="small custom-button mb-0 text-center">Belum punya akun? <a href="pages-register.html">Daftar Akun</a></p>
                </div>
            </form>
        </div>
    </div>
@endsection