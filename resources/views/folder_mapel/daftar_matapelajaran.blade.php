@extends('layouts.ahmad_akbar')
@section('ahmad_akbar')
<font face="Nirmala UI Regular">
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-start">
                <h4><b>{{ $tittle }}</b></h4>
            </div>
            @if (Auth::user()->role == 'admin')
            <br>
            <div class="row justify-content-center">
                <div class="col-xl-4">
                    <a href="/mapelkelas10/create" class="btn btn-dark" style="width: 97%">Tambah Data Mata Pelajaran</a>
                </div>
                <div class="col-xl-8">
                </div>
            </div>
            @endif
            <br>
            <div class="row">
                <div class="col-xl-12">
                    <table class="table table-bordered table-striped table-hover">
                        <thead style="background-color: rgb(150, 150, 150); color: white">
                            <tr>
                                <th>Nomor</th>
                                <th>Kode Mata Pelajaran</th>
                                <th>Nama Mata Pelajaran</th>
                                @if (Auth::user()->role == 'admin')
                                <th>Ubah</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mapel as $key => $mp)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $mp->kode_mapel }}</td>
                                <td>{{ $mp->nama_mapel }}</td>
                                @if (Auth::user()->role == 'admin')
                                    <td>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <a href="{{ url('mapelkelas10/'.$mp->kode_mapel.'/edit', []) }}" style="width: 100%" class="btn btn-primary">🖊</a>
                                            </div>
                                            <div class="col-xl-6">
                                                <a href="{{ url('mapelkelas10/delete/'.$mp->kode_mapel, []) }}" class="btn btn-danger" onclick="return confirm('Apakah ingin dihapus?')" style="width: 100%">X</a>
                                            </div>
                                        </div>
                                    </td>
                                @endif
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
