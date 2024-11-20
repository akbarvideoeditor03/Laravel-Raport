@extends('layouts.ahmad_akbar')
@section('ahmad_akbar')
<font face="Nirmala UI Regular">
    <div class="card">
        <div class="card-header" id="imgdatasiswa" style="height: 5cm">
        </div>
        <div class="card-header">
            <h4><b>{{ $tittle }}</b></h4>
        </div>
        
        <div class="card-body">
            @if (Auth::user()->role == 'admin' || Auth::user()->role == 'walas')
            <div class="row">
                <div class="col-xl-3">
                    <a href="/daftaralamat" class="btn btn-primary" style="width: 90%" target="blank">Daftar Alamat Siswa</a>
                </div>
                <div class="col-xl-3">
                    <a href="/absensiswa" class="btn btn-primary" style="width: 90%">Absensi Siswa</a>
                </div>
                <div class="col-xl-3">
                @if (Auth::user()->role == 'admin')
                        <a href="/datasiswa/create" class="btn btn-primary" style="width: 90%">Tambah Data</a>
                        @endif
                </div>
                <div class="col-xl-3">
                </div>
            </div>
            @endif
            <br>

            <div class="row">
                <div class="col-xl-12">
                    <table class="table table-bordered table-striped table-hover">
                        <thead style="background-color: rgb(150, 150, 150); color: white">
                            <tr>
                                <th>No</th>
                                <th>NISN</th>
                                <th style="width: 20%">Nama Siswa</th>
                                <th>Jenis Kelamin</th>
                                <th>Nomor Kontak</th>
                                @if (Auth::user()->role == 'admin' || Auth::user()->role == 'kepsek' || Auth::user()->role == 'walas')
                                <th style="width: 20%">Nama Wali Siswa</th>
                                <th>Gambar Tanda Tangan</th>
                                @if (Auth::user()->role == 'admin')
                                <th>Ubah</th>
                                @endif
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $sey => $s)
                            <tr>
                                <td>{{ $sey + 1 }}</td>
                                <td>{{ $s->nisn }}</td>
                                <td>{{ $s->nama_siswa }}</td>
                                <td>{{ $s->jenis_kelamin }}</td>
                                <td>{{ $s->nomor_kontak }}</td>
                                @if (Auth::user()->role == 'admin' || Auth::user()->role == 'kepsek' || Auth::user()->role == 'walas')
                                <td>{{ $s->nama_wali_siswa }}</td>
                                <td>
                                    <center>
                                        <img src="{{ asset('storage/gambar_ttd_tanganwalisiswa/' . $s->gambar_ttd_tanganwalisiswa) }}" alt="Foto TTD Wali Siswa" style="max-width: 30%">
                                    </center>
                                </td>
                                @if (Auth::user()->role == 'admin')
                                <td>
                                    <div class="col">
                                        <div class="row">
                                            <a href="{{ url('datasiswa/'.$s->nisn.'/edit', []) }}" class="btn btn-primary">🖊</a>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <a href="{{ url('datasiswa/delete/'.$s->nisn, []) }}"
                                                class="btn btn-danger"
                                                onclick="return confirm('Apakah ingin dihapus?')">X</a>
                                        </div>
                                    </div>
                                </td>
                                @endif
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
