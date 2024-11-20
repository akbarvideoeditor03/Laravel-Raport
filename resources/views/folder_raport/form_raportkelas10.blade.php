@extends('layouts.ahmad_akbar')
@section('ahmad_akbar')
<font face="Nirmala UI Regular">
    @auth()
    <div class="card">
        <div class="card-header">
            <center><h3><b>{{ $judul }}</b></h3></center>
        </div>

        <div class="card-body">

            {!! Form::model($absen, ['route' => $alamat_rute, 'method' => $cara, 'id' => 'form-nilai']) !!}
            @csrf

            <div class="form-group">
                <label for="my-input">Pilih NISN (Identitas) </label>
                {!! Form::select('nisn', $siswa, null, ['class' => 'form-control']) !!}
            </div>

            <br>

            <div class="form-group">
                <label for="my-input">Pilih Kode Tahun Ajaran </label>
                {!! Form::select('kode_tahunajaran', $tahun, null, ['class' => 'form-control']) !!}
            </div>

            <br>

            <div class="form-group">
                <label for="my-input">Pilih Kode Sekolah </label>
                {!! Form::select('npsn', $sekolah, null, ['class' => 'form-control']) !!}
            </div>

            <br>

            <div class="form-group">
                <label for="my-input">Pilih Absen <span style="color: red">*Sesuaikan Dengan NISN (Identitas)</span></label>
                {!! Form::select('id_absensi', $absen, null, ['class' => 'form-control']) !!}
            </div>                        

            <br>

            <div class="form-group">
                <label for="my-input">Pilih NIP Wali Kelas</label>
                {!! Form::select('nip_walikelas', $walas, null, ['class' => 'form-control']) !!}
            </div>                        

            <br>

            <div class="form-group">
                <label for="my-input">Pilih NIP Kepala Sekolah</label>
                {!! Form::select('nip_kepalasekolah', $kepsek, null, ['class' => 'form-control']) !!}
            </div>                        

            <br>

            <div class="form-group">
                {!! Form::submit($tombol, ['class'=>'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    @endauth
</font>
@endsection
