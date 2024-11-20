@extends('layouts.ahmad_akbar')
@section('ahmad_akbar')
    
    <div class="card">
        <div class="card-header" id="background-sekolah" style="height: 5cm">
            <h4 style="color: white"><b>{{ $judul }}</b></h4>
        </div>
        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'kepsek')
        <div class="card-header">
            <div class="row">
                <div class="col-xl-4">
                    <center>
                        <a href="/school/create" class="btn btn-primary" style="width: 90%">Tambah Data</a>
                    </center>
                </div>
                <div class="col-xl-4">
                    <center>
                        <a href="/tahunajaransekolah" class="btn btn-secondary" style="width: 90%">Tahun Ajaran Sekolah</a>
                    </center>
                </div>
                <div class="col-xl-4">
                    <center>
                        <a href="https://www.smaxaverius1jbi.sch.id/beranda" class="btn btn-info" style="width: 90%" target="blank">Website Sekolah</a>
                    </center>
                </div>
            </div>
        </div>
        @endif
        @foreach ($sekolah as $s)
        <div class="card-body">
            <div class="row">
                <div class="col-xl-4">
                    <img src="{{ asset('storage/gambar_sekolah/' . $s->gambar_sekolah) }}" alt="Gambar Sekolah" style="max-width: 100%">
                </div>
                <div class="col-xl-8">
                    <div class="row">
                        <h5>
                            <table class="">
                                <tbody class="">
                                    <tr>
                                        <td id="pdd">Nomor Pokok Sekolah Nasional (NPSN) </td>
                                        <td id="pdd">:</td>
                                        <td id="pdd">{{ $s->npsn }}</td>
                                    </tr>
                                    <tr>
                                        <td id="pdd">Nama</td>
                                        <td id="pdd">:</td>
                                        <td id="pdd">{{ $s->nama_sekolah }}</td>
                                    </tr>
                                    <tr>
                                        <td id="pdd">Alamat Sekolah</td>
                                        <td id="pdd">:</td>
                                        <td id="pdd">{{ $s->alamat_sekolah }}</td>
                                    </tr>
                                    <tr>
                                        <td id="pdd">Kontak Telepon</td>
                                        <td id="pdd">:</td>
                                        <td id="pdd">{{ $s->kontak_telepon }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </h5>
                    </div>
                    <div class="row">
                        @if (Auth::user()->role == 'admin')
                            <div class="col-xl-2">
                                <a href="{{ url('school/'.$s->npsn.'/edit', []) }}" class="btn btn-info tombol">Edit</a>
                            </div>
                            <div class="col-xl-2">
                                <a href="{{ url('school/delete/'.$s->npsn, []) }}" class="btn btn-danger tombol" onclick="return confirm('Apakah ingin dihapus?')">Hapus</a>
                            </div>
                            <div class="col-xl-8">
    
                            </div>
                        @endif
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection