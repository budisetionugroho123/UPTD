@extends('layouts.master')
@section('content')
<div class="container bg-white" >
    <div class="row   justify-content-center">
        <div class="col-lg-10 m-5">
            @if (auth()->user()->role == 'manager_teknis')
            <a href="" class="btn  btn-primary float-end mb-3"><i class="fas fa-plus"> Tambah </i></a>
            @endif
            <table class="table border w-100" id="table">
                <thead >
                    <th>No</th>
                    <th>UUID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No Hp</th>
                    <th>Role</th>
                    <th>Tindakan</th>
                </thead>
                <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$user->uuid}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->no_hp}}</td>
                            <td>{{$user->role}}</td>
                            <td style="width: 100px">
                                <a  class="" href="{{route('role.edit.form', $user->uuid)}}" >
                                    <i class="fas fa-pen text-success" ></i>
                                </a>
                                |
                                <a class="fas fa-trash text-danger" href="{{route('role.delete', $user->id)}}" data-confirm-delete="true">
                                </a>
                               
                            </td>
                            
                        </tr>
                        
                    @endforeach
        
                </tbody>
            </table>
    
        </div>
    
    </div>
</div>

@endsection