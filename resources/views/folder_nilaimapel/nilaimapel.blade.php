@extends('layouts.ahmad_akbar')
@section('ahmad_akbar')
<font face="Nirmala UI Regular">
    <div class="card">
        <div class="card-body">

            <div class="row justify-content-center">
                <h4><b>{{ $judulsiswa }}</b></h4>
            </div>
            <div class="row justify-content-center">
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>NISN</th>
                                <th>Nama</th>
                                <th>Nilai Rata-Rata</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nilai_rata_rata as $key => $nilai)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <a href="{{ route('detailnilai', ['nisn' => $nilai->nisn]) }}">
                                            {{ $nilai->nisn }}
                                        </a>
                                    </td>
                                    <td>{{ $nilai->siswa->nama_siswa }}</td>
                                    <td>{{ number_format($nilai->nilai_rata_rata, 1) }}</td>
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
                                <a href="/nilaikelas10/create" class="btn btn-primary" style="width: 90%">Tambah Nilai Siswa</a>
                            </div>
                            <div class="col-xl-4">
                            </div>
                            <div class="col-xl-4">
                            </div>
                        </div>
                    </center>
                </div>
            </div>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
    </div>
</font>
@endsection
