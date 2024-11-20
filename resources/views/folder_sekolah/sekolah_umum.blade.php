@extends('layouts.ahmad_akbar')
@section('ahmad_akbar')
    
    <div class="card">
        <div class="card-header" id="background-sekolah" style="height: 5cm">
            <h4 style="color: white"><b>{{ $judul }}</b></h4>
        </div>
        @foreach ($sekolah as $s)
        <div class="row">
            <div class="col-xl-4">
                <div class="card-body">
                    <img src="{{ asset('storage/gambar_sekolah/' . $s->gambar_sekolah) }}" alt="Gambar Sekolah" style="max-width: 100%">
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card-body">
                    <h5>
                        <b>
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
                        </b>
                    </h5>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection