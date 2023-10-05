<div class="container bg-white ">
    <h3 class="display-6">Daftar Analisa</h3>
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
                                        <option value="">Pilih Penguji</option>
                                    @foreach ($daftarPenguji as $penguji)
                                        <option value="{{$penguji->id}}">{{$penguji->name}}</option>
                                    @endforeach
                                    </select>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <button type="submit" class="btn btn-sm btn-primary">Kirim</button>
            </form>
        </div>
    </div>
</div>