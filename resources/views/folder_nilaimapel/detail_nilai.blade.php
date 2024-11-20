@extends('layouts.ahmad_akbar')
@section('ahmad_akbar')
<font face="Nirmala UI Regular">
    <div class="card">
        <div class="card-body">
            <h4><b>{{ $judul }}</b></h4>
            <br>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>NISN</th>
                        <th>Kode Mata Pelajaran</th>
                        <th>Mata Pelajaran</th>
                        <th>Nilai</th>
                        <th>Keterangan</th>
                        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'walas')
                            <th>Hapus Nilai</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detailnilai as $dtn)
                    <tr>
                        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'walas')
                            <td>
                                <a href="{{ url('detailnilai/'.$dtn->kode_nilai_mapel.'/edit', []) }}">
                                {{ $dtn->nisn }}</a>
                            </td>
                        @endif

                        @if (Auth::user()->role == 'siswa')
                            <td>{{ $dtn->nisn }}</td>
                        @endif
                        
                        <td>{{ $dtn->kode_mapel }}</td>
                        <td>{{ $dtn->mapel->nama_mapel }}</td>
                        <td>{{ $dtn->nilai }}</td>
                        <td>{{ $dtn->keterangan }}</td>
                        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'walas')
                            <td><center>
                                <a href="{{ url('detailnilai/delete/'.$dtn->kode_nilai_mapel, []) }}"
                                    class="btn btn-danger"
                                    onclick="return confirm('Apakah ingin dihapus?')" style="width: 95%">X
                                </a>
                                </center>
                            </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ url()->previous() }}" class="btn btn-outline-dark" style="width: 10%">Kembali</a>
        </div>
    </div>
</font>
@endsection
