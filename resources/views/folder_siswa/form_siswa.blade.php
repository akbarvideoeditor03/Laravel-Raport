@extends('layouts.ahmad_akbar')
@section('ahmad_akbar')
<font face="Nirmala UI Regular">
    @auth()
    <div class="card">
        <div class="card-header">
            <center><h3><b>{{ $judul }}</b></h3></center>
        </div>

        <div class="card-body">

            {!! Form::model($siswabaru, ['route' => $alamat_rute, 'method' => $cara, 'enctype' => 'multipart/form-data', 'id' => 'imageForm']) !!}
            @csrf

            <div class="form-group">
                <label for="my-input">NISN <strong style="color: red; font-weight: bold">
                    *Wajib Diisi</strong></label>
                {!! Form::text('nisn', null, ['class'=>'form-control']) !!}
                <span class="text-helper">{{ $errors->first('nisn') }}</span>                       
            </div>

            <br>

            <div class="form-group">
                <label for="my-input">Nama</label>
                {!! Form::text('nama_siswa', null, ['class'=>'form-control']) !!}
                <span class="text-helper">{{ $errors->first('nama_siswa') }}</span>                       
            </div>

            <br>

            <div class="form-group">
                <label for="my-input">Jenis Kelamin</label>
                {!! Form::select('jenis_kelamin', $klmn, null, ['class'=>'form-control']) !!}
                <span class="text-helper">{{ $errors->first('jenis_kelamin') }}</span>                       
            </div>

            <br>

            <div class="form-group">
                <label for="my-input">Nomor Kontak</label>
                {!! Form::text('nomor_kontak', null, ['class'=>'form-control']) !!}
                <span class="text-helper">{{ $errors->first('nomor_kontak') }}</span>                       
            </div>

            <br>

            <div class="form-group">
                <label for="my-input">Nama Wali Siswa</label>
                {!! Form::text('nama_wali_siswa', null, ['class'=>'form-control']) !!}
                <span class="text-helper">{{ $errors->first('nama_wali_siswa') }}</span>                       
            </div>

            <br>

            <div class="form-group">
                <label for="my-input">Gambar Tanda Tangan <span id="warna1">(Format png - Maks. 5 Mb)</span></label>
                <input type="file" class="form-control" id="gambar_ttd_tanganwalisiswa" name="gambar_ttd_tanganwalisiswa" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                @error('gambar_ttd_tanganwalisiswa')
                    <strong id="warna1">{{ $message }}</strong>
                @enderror 
                <br>
                <img src="" class="img-thumbnail" id="output" width="250">
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
