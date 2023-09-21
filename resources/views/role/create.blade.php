@extends('layouts.master')
@section('content')
<div class="container bg-white">
    <div class="row">
        <div class="col-10 m-5">
            <form action="{{route('role.store')}}" method="post" onsubmit="return submitRole()">
                @csrf
                  <div class="form-group row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Nama Pengguna</label>
                    <div class="col-sm-10">
                      <input type="text" name="name" value="{{old('name')}}" class="form-control" id="name"  >
                      <small id="errorName" class="text-danger text-italic d-none">Mohon masukkan nama pengguna</small>
                    </div>
                  </div>
                  <div class="form-group row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" name="email" class="form-control" id="email"  >
                      <small id="errorEmail" class="text-danger text-italic d-none">Mohon masukkan email</small>
                      @error('email')
                            <small id="errorEmail" class="text-danger text-italic d-none">{{$message}}</small>
                            
                        @enderror
                    </div>
                  </div>
                  <div class="form-group row mb-3">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" placeholder="******" name="password" class="form-control" id="password"  >
                      <small id="errorPassword" class="text-danger text-italic d-none">Mohon masukkan password</small>
                    </div>
                  </div>
                  <div class="form-group row mb-3">
                    <label for="no_hp" class="col-sm-2 col-form-label">No Hp</label>
                    <div class="col-sm-10">
                      <input type="text" name="no_hp" class="form-control" id="no_hp"  >
                      <small id="errorNoHp" class="text-danger text-italic d-none">Mohon masukkan no hp</small>
                    </div>
                  </div>
                  <div class="form-group row mb-3">
                    <label for="role" class="col-sm-2 col-form-label">Role</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="role" name="role">
                        <option value="">Pilih Role</option>
                        @foreach ($roles as $role)
                            <option value="{{$role->role}}">{{$role->label}}</option>
                        @endforeach
                        </select>
                        <small id="errorRole" class="text-danger text-italic d-none">Mohon pilih role</small>
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
<script>
    function submitRole(){
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
        var password= $("#password").val();
        if(password == ""){
            $("#errorPassword").removeClass('d-none')
            return false;
        }else {
            $("#errorPassword").addClass('d-none')

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
</script>
@endsection