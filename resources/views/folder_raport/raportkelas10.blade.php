@extends('layouts.ahmad_akbar')
@section('ahmad_akbar')
@auth()
    <font face="Nirmala UI Regular">
        <div class="card">
            <div class="card-body">

                <div class="row justify-content-center">
                    <h4><b>{{ $tittle }}</b></h4>
                </div>
                <div class="row justify-content-center">
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>NISN</th>
                                    <th>Nama Siswa</th>
                                    <th>Lihat Rapor</th>
                                    <th>Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rapors as $key => $r)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $r->nisn }}</td>
                                        <td>{{ $r->siswa->nama_siswa }}</td>
                                        <td>
                                            <center>
                                                <a href="{{ route('show', ['nomor_raport' => $r->nomor_raport]) }}" class="btn btn-info">Lihat Rapor</a>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <a href="{{ route('delete', ['nomor_raport' => $r->nomor_raport]) }}" class="btn btn-danger"
                                                    onclick="return confirm('Anda yakin?')">X</a>
                                            </center>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <div class="row justify-content-start">
                    <div class="card-body">
                        <center>
                            <div class="row justify-content-center">
                                <div class="col-xl-4">
                                    <a href="/raportkelas10/create" class="btn btn-primary" style="width: 90%">Tambah Daftar Raport Siswa</a>
                                </div>
                                <div class="col-xl-4">
                                </div>
                                <div class="col-xl-4">
                                </div>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </font>
@endauth
@endsection