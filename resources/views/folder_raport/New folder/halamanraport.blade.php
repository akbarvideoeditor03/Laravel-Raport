@extends('layouts.ahmad_akbar')
@section('ahmad_akbar')
@auth()
<font face="Nirmala UI Regular">
    <div class="card" style="width: 100%">
        <div class="card-header">
            <center>
                <h4><b>{{ $judul }}</b></h4>
            </center>
        </div>
        <div class="card-body">
            <div class="row">
                <h5>Identitas Siswa</h5>
                <br>
                <div class="col-xl-6">
                    <table>
                        <tbody>
                            <tr>
                                <td id="pdd">NISN</td>
                                <td id="pdd">:</td>
                                <td id="pdd">{{ $rapors->siswa->nisn }}</td>
                            </tr>
                            <tr>
                                <td id="pdd">Nama Siswa</td>
                                <td id="pdd">:</td>
                                <td id="pdd">{{ $rapors->siswa->nama_siswa }}</td>
                            </tr>
                            <tr>
                                <td id="pdd">Sekolah</td>
                                <td id="pdd">:</td>
                                <td id="pdd">{{ $rapors->sekolah->nama_sekolah }}</td>
                            </tr>
                            <tr>
                                <td id="pdd">Alamat Sekolah</td>
                                <td id="pdd">:</td>
                                <td id="pdd">{{ $rapors->sekolah->alamat_sekolah }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-xl-6">
                    <table>
                        <tbody>
                            <tr>
                                <td id="pdd">Semester Berjalan</td>
                                <td id="pdd">:</td>
                                <td id="pdd">{{ $rapors->thn_ajaran->semester }}
                                    <span>
                                        @if($rapors->thn_ajaran->semester % 2 == 0)
                                            (Genap)
                                        @else
                                            (Ganjil)
                                        @endif
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td id="pdd">Tahun Ajaran</td>
                                <td id="pdd">:</td>
                                <td id="pdd">{{ substr($rapors->thn_ajaran->tahun1, 0, 4) }} / {{ substr($rapors->thn_ajaran->tahun2, 0, 4) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <hr>

                <div class="row">
                <h5>Tabel Nilai</h5>
                <br>
                    <div class="col-xl-12">
                        <center>
                            <table class="table table-bordered table-striped table-hover">
                                <thead style="background-color: rgb(150, 150, 150); color: white">
                                    <tr>
                                        <th>Kode Mapel</th>
                                        <th>Nilai Akhir</th>
                                        <th>Capaian Kompetisi</th>
                                        <th>Ubah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($nila as $n )
                                        <tr>
                                            <td>{{ $n->kode_mapel }}</td>
                                            <td>{{ $n->nilai }}</td>
                                            <td>{{ $n->keterangan }}</td>
                                            <td>
                                                <center>
                                                    <a href="{{ url('detailnilai/'.$n->kode_nilai_mapel.'/edit', []) }}" class="btn btn-info">Edit</a>
                                                </center>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </center>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <h5>Tabel Absen</h5>
                    <br>
                    <div class="col-xl-12">
                        <table class="table table-bordered table-striped table-hover">
                            <thead style="background-color: rgb(150, 150, 150); color: white">
                                <tr>
                                    <th>Hadir</th>
                                    <th>Izin</th>
                                    <th>Tanpa Keterangan (Alpa)</th>
                                    <th>Ubah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($absensi as $abs )
                                    <tr>
                                        <td>{{ $abs->hadir }}</td>
                                        <td>{{ $abs->izin }}</td>
                                        <td>{{ $abs->alpa }}</td>
                                        <td><a href="{{ url('absensiswa/'.$abs->id_absensi.'/edit', []) }}" class="btn btn-info tombol">Edit</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <h5>Konfirmasi Rapor</h5>
                    <br>
                    <br>
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-xl-1">
                            </div>
                            <div class="col-xl-2">
                                <p>Mengetahui Wali Siswa</p>
                            </div>
                            <div class="col-xl-6">
                            </div>
                            <div class="col-xl-2">
                                <p>Mengetahui Wali Kelas</p>
                            </div>
                            <div class="col-xl-1">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-1">
                            </div>
                            <div class="col-xl-2">
                                <center>
                                    <img src="{{asset('storage/gambar_ttd_tanganwalisiswa/' . $rapors->siswa->gambar_ttd_tanganwalisiswa) }}" alt="" style="width: 70%">
                                </center>
                            </div>
                            <div class="col-xl-6">
                            </div>
                            <div class="col-xl-2">
                                <center>
                                    <img src="{{asset('storage/gmbr_ttd_wali_kelas/' . $rapors->walikelas->gmbr_ttd_wali_kelas) }}" alt="" style="width: 70%">
                                </center>
                            </div>
                            <div class="col-xl-1">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-1">
                            </div>
                            <div class="col-xl-2">
                                <center>
                                    <p>{{ $rapors->siswa->nama_wali_siswa }}</p>
                                </center>
                            </div>
                            <div class="col-xl-6">
                            </div>
                            <div class="col-xl-2">
                                <center>
                                    <p>{{ $rapors->walikelas->nama_walikelas }}</p>
                                </center>
                            </div>
                            <div class="col-xl-1">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-xl-12">
                                <center>
                                    <p>Mengetahui Kepala Sekolah</p>
                                </center>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-5">
                            </div>
                            <div class="col-xl-2">
                                <center>
                                    <img src="{{asset('storage/gambar_ttd_tangan/' . $rapors->kepalasekolah->gambar_ttd_tangan) }}" alt="" style="width: 70%">
                                </center>
                            </div>
                            <div class="col-xl-5">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-5">
                            </div>
                            <div class="col-xl-2">
                                <center>
                                    <p>{{ $rapors->kepalasekolah->nama_kepalasekolah }}</p>
                                </center>
                            </div>
                            <div class="col-xl-5">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-5">
                            </div>
                            <div class="col-xl-2">
                                <center>
                                    <p><b>{{ $rapors->kepalasekolah->nip_kepalasekolah }}</b></p>
                                </center>
                            </div>
                            <div class="col-xl-5">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</font>
@endauth
@endsection
