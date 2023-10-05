@extends('layouts.master')
@section('content')
<div class="container bg-white mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-10 ml-5 mr-5 mt-3 mb-5">
            <form action="{{route('analisis.assign.penguji')}}" method="POST">
                @csrf
                <table class="table">
                    <thead>
                        <th>No</th>
                        <th>Nama Parameter</th>
                        <th>Penguji</th>
                    </thead>
                    <tbody>
                        @php
                            $count = 1;
                        @endphp
                        <input type="hidden" name="pesanan_id" value="{{$idPesanan}}">
                        @foreach ($listAnalisa as $analisis)
                            <input type="hidden" name="analisis_{{$analisis->id}}[]" value="{{$analisis->id}}" >
                            <tr>
                                <td>{{$count++}}</td>
                                <td>{{$analisis->nama_pengujian}}</td>
                                <td>
                                    <select name="analisis_{{$analisis->id}}[]" class="form-select" id="">
                                        @if (is_null($analisis->user) )
                                            <option value="">Pilih Penguji</option>
                                        @else     
                                            <option value="{{$analisis->user->id}}">{{$analisis->user->name}}</option>
                                        @endif
                                    @foreach ($daftarPenguji as $penguji)
                                        <option value="{{$penguji->id}}">{{$penguji->name}}</option>
                                    @endforeach
                                    </select>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- <div class="btn-group"> --}}
                    <button type="submit" class="btn btn-sm btn-primary mr-5">Kirim</button>
                    <a href="{{route('konfirmasi.proses.analisa',$idPesanan)}}" class=" btn btn-sm btn-primary ml-5 pl-5">Mulai Proses Analisa</a>
                  {{-- </div> --}}
            </form>
        </div>
    </div>         
</div>            
            
            
@endsection