@extends('layouts.ahmad_akbar')
@section('ahmad_akbar')
<font face="Nirmala UI Regular">
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-start">
                <h4><b>{{ $tittle }}</b></h4>
            </div>
            <br>
            <div class="row justify-content-center">
                <a href="/tahunajaransekolah/create" class="btn btn-dark" style="width: 97%">Tambah Tahun Ajaran</a>
            </div>
            <br>
            <div class="row">
                <div class="col-xl-12">
                    <table class="table table-bordered table-striped table-hover">
                        <thead style="background-color: rgb(150, 150, 150); color: white">
                            <tr>
                                <th>Tahun Pertama</th>
                                <th>Tahun Kedua</th>
                                <th>Semester</th>
                                <th>Ubah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tahun as $s)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($s->tahun1)->isoFormat('DD MMMM YYYY') }}</td>
                                <td>{{ \Carbon\Carbon::parse($s->tahun2)->isoFormat('DD MMMM YYYY') }}</td>
                                <td>{{ $s->semester }}
                                    <span>
                                        @if($s->semester % 2 == 0)
                                            (Genap)
                                        @else
                                            (Ganjil)
                                        @endif
                                    </span>
                                </td>
                                <td>
                                    <center>
                                        <a href="{{ url('tahunajaransekolah/'.$s->kode_tahunajaran.'/edit', []) }}" style="width: 100%" class="btn btn-primary">🖊</a>
                                    </center>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</font>
@endsection
