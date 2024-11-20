@extends('layouts.ahmad_akbar')
@section('ahmad_akbar')
<font face="Nirmala UI Regular">
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-start">
                <h4><b>{{ $tittle }}</b></h4>
            </div>
            <br>
            @if (Auth::user()->role == 'admin')
            <div class="row">
                <div class="col">
                    <a href="/walikelas10/create" class="btn btn-primary" style="width: 25%">Tambah Data</a>
                </div>
            </div>
            <hr>
            @endif
            @foreach ($walas as $w)
            <div class="row">
                <!-- foto akun -->
                
                <div class="col-md-4 col-sm-12">
                    <h6>Gambar Tanda Tangan :</h6>
                    <img src="{{ asset('storage/gmbr_ttd_wali_kelas/' . $w->gmbr_ttd_wali_kelas) }}" alt="Foto Tanda Tangan Wali Kelas" style="max-width: 100%">
                </div>
    
                <!-- judul isian -->
                <div class="col-xl-6" style="padding-block-end: 2%">
                    <div class="row">
                        <table class="">
                            <tbody class="">
                                <tr>
                                    <td id="pdd">NIP</td>
                                    <td id="pdd">:</td>
                                    <td id="pdd">{{ $w->nip_walikelas }}</td>
                                </tr>
    
                                <!--
                                <tr>
                                    <td id="pdd">Password</td>
                                    <td id="pdd">:</td>
                                    <td id="pdd">{{ $w->password }}</td>
                                </tr>
                                -->
        
                                <tr>
                                    <td id="pdd">Nama</td>
                                    <td id="pdd">:</td>
                                    <td id="pdd">{{ $w->nama_walikelas }}</td>
                                </tr>
                                <tr>
                                    <td id="pdd">Nomor Telepon</td>
                                    <td id="pdd">:</td>
                                    <td id="pdd">{{ $w->nomor_telepon }}</td>
                                </tr>
                                <tr>
                                    <td id="pdd">Alamat</td>
                                    <td id="pdd">:</td>
                                    <td id="pdd">{{ $w->nama_jalan }}, {{ $w->nama_desa_kelurahan }}, {{ $w->nama_kecamatan }}, {{ $w->nama_kota_kabupaten }}, {{ $w->nama_provinsi }}, {{ $w->kode_pos }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <br>
                    @if (Auth::user()->role == 'admin' || Auth::user()->role == 'walas')
                    <div class="row">
                        <div class="col-xl-4">
                            <a href="{{ url('walikelas10/'.$w->nip_walikelas.'/edit', []) }}" style="width: 100%" class="btn btn-info">Edit Data</a>
                        </div>

                        @if (Auth::user()->role == 'admin')
                            <div class="col-xl-4">
                                <a href="{{ url('walikelas10/delete/'.$w->nip_walikelas, []) }}"
                                    class="btn btn-danger" style="width: 100%"
                                    onclick="return confirm('Apakah ingin dihapus?')">Hapus</a>
                            </div>
                        @endif
                    </div>
                    @endif
                </div>
                
            @endforeach
        </div>
    </div>
</font>
@endsection
