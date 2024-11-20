@extends('layouts.ahmad_akbar')
@section('ahmad_akbar')
<font face="Nirmala UI Regular">
    <div class="card">
        <div class="card-body">

            <div class="row justify-content-start">
                <h4><b>{{ $title }}</b></h4>
            </div>

            <br>

            @if (Auth::user()->role == 'admin' || Auth::user()->role == 'kepsek')
                <div class="row">
                    <div class="col">
                        <a href="/kepalasekolah/create" class="btn btn-primary" style="width: 25%">Tambah Data</a>
                    </div>
                </div>
                <hr>
            @endif
            
            @foreach ($kps as $k)
                <div class="row">
                    
                    <!-- foto akun -->
                    <div class="col-xl-4">
                        <h6>Gambar Tanda Tangan :</h6>
                        <img src="{{ asset('storage/gambar_ttd_tangan/' . $k->gambar_ttd_tangan) }}" alt="Foto Kepala Sekolah" style="max-width: 100%">
                    </div>

                    <!-- judul isian -->
                    <div class="col-xl-8">
                        <div class="row">
                            <table class="">
                                <tbody class="">
                                    <tr>
                                        <td id="pdd">NIP</td>
                                        <td id="pdd">:</td>
                                        <td id="pdd">{{ $k->nip_kepalasekolah }}</td>
                                    </tr>
    
                                    <!--
                                    <tr>
                                        <td id="pdd">Password</td>
                                        <td id="pdd">:</td>
                                        <td id="pdd">{{ $k->password }}</td>
                                    </tr>
                                    -->
            
                                    <tr>
                                        <td id="pdd">Nama</td>
                                        <td id="pdd">:</td>
                                        <td id="pdd">{{ $k->nama_kepalasekolah }}</td>
                                    </tr>
            
                                    <tr>
                                        <td id="pdd">Alamat</td>
                                        <td id="pdd">:</td>
                                        <td id="pdd">{{ $k->alamat_kepalasekolah }}</td>
                                    </tr>
            
                                    <tr>
                                        <td id="pdd">Nomor Telepon</td>
                                        <td id="pdd">:</td>
                                        <td id="pdd">{{ $k->nomor_telepon }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row" style="padding-block-start: 2%">
                            <div class="col-xl-4">
                                @if (Auth::user()->role == 'admin' || Auth::user()->role == 'kepsek')
                                    <a href="{{ url('kepalasekolah/'.$k->nip_kepalasekolah.'/edit', []) }}" class="btn btn-info" style="width: 100%">Edit Data</a>
                            </div>
                            <div class="col-xl-4">
                                    <a   a href="{{ url('kepalasekolah/delete/'.$k->nip_kepalasekolah, []) }}"
                                        class="btn btn-danger"style="width: 100%"
                                        onclick="return confirm('Apakah ingin dihapus?')">Hapus</a>
                                @endif
                            </div>
                            <div class="col-xl-4">
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</font>
@endsection
