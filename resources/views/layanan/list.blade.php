@extends('layouts.master')
@section('content')
<div class="container bg-white" >
    {{-- @if (session()->has('message'))
        <div class="row justify-content-center">
            <div class="col-lg-11">
                <div class="alert alert-success alert-dismissible">
                    <a  href="#" class="close float-end " data-bs-dismiss="alert" aria-label="close">&times;</a>
                    {{ session('message') }}
                </div>  
            </div>
        </div>
    @endif --}}
    <div class="row   justify-content-center">
        <div class="col-lg-10 m-5">
            <table class="table border" id="table">
                <thead >
                    <th>No</th>
                    <th>UUID</th>
                    <th>Nama Layanan</th>
                    <th>Jenis Sampel</th>
                    <th>Acuan Sampel</th>
                    <th>Tindakan</th>
                </thead>
                <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach ($data['layanan'] as $layanan)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$layanan->uuid}}</td>
                            <td>{{$layanan->nama_layanan}}</td>
                            <td>{{$layanan->jenis_sampel}}</td>
                            <td>{{$layanan->acuan_pengambilan_sampel}}</td>
                            <td class="text-center">
                                <a href="/layanan/detail/{{$layanan->uuid}}" >
                                    <i class="fa fa-pen text-success" ></i>
                                </a>
                                |
                                <a href="" data-bs-toggle="modal" data-bs-target="#modalDeleteLayanan" onclick="deleteLayanan('{{$layanan->id}}')">
                                    <i class="fas fa-trash text-danger"></i>
                                </a>
                            </td>
                        </tr>
                        
                    @endforeach
        
                </tbody>
            </table>
    
        </div>
    
    </div>
</div>
@include('layanan.modal-delete-layanan')
<script>
    function deleteLayanan(id){
        var element = `
                <input type="hidden" name="id" id="id" value= "${id}">
                `;
        var form = $('#form-delete-layanan');
        form.append(element);
    }
</script>
@endsection