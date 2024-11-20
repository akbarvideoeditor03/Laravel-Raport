@extends('layouts.ahmad_akbar')
@section('ahmad_akbar')
<font face="Nirmala UI Regular">
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-start">
                <h4><b>{{ $tittle }}</b></h4>
            </div>

            <br>

            <center>
                <div class="row justify-content-center">
                    <div class="col-xl-4">
                        <a href="/absensiswa/create" class="btn btn-primary" style="width: 90%">Tambah Absen</a>
                    </div>
                    <div class="col-xl-4">
                    </div>
                    <div class="col-xl-4">
                    </div>
                </div>
            </center>

            <br>

            <div class="row">
                <div class="col-xl-12">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NISN</th>
                                <th>Nama</th>
                                <th>Hadir</th>
                                <th>Izin</th>
                                <th>Alpa</th>
                                <th>Ubah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($absensiswa as $key => $abs)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $abs->siswa->nisn }}</td>
                                <td>{{ $abs->siswa->nama_siswa }}</td>
                                <td>{{ $abs->hadir }}</td>
                                <td>{{ $abs->izin }}</td>
                                <td>{{ $abs->alpa }}</td>
                                <td>
                                    <div class="col">
                                        <div class="row">
                                            <a href="{{ url('absensiswa/'.$abs->id_absensi.'/edit', []) }}" class="btn btn-primary">🖊</a>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <a href="{{ url('absensiswa/delete/'.$abs->id_absensi, []) }}"
                                                class="btn btn-danger"
                                                onclick="return confirm('Apakah ingin dihapus?')">X</a>
                                        </div>
                                    </div>
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
