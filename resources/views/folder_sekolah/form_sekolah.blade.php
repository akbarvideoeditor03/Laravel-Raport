@extends('layouts.ahmad_akbar')
@section('ahmad_akbar')
@auth()
<font face="Nirmala UI Regular">
    <div class="card">
        <div class="card-header">
            <center><h4><b>{{ $judul }}</b></h4></center>
        </div>
        <div class="card-body">
            {!! Form::model($sekolahbaru, ['route' => $alamat_rute, 'method' => $cara, 'enctype' => 'multipart/form-data', 'id' => 'imageForm' ]) !!}
            @csrf

            <div class="form-group">
                <label for="my-input">NPSN <strong style="color: red; font-weight: bold">
                    *Wajib Diisi</strong></label>
                {!! Form::text('npsn', null, ['class'=>'form-control']) !!}
                <span class="text-helper">{{ $errors->first('npsn') }}</span>                       
            </div>

            <br>

            <div class="form-group">
                <label for="my-input">Nama Sekolah</label>
                {!! Form::text('nama_sekolah', null, ['class'=>'form-control']) !!}
                <span class="text-helper">{{ $errors->first('nama_sekolah') }}</span>                       
            </div>

            <br>

            <div class="form-group">
                <label for="my-input">Alamat Sekolah</label>
                {!! Form::text('alamat_sekolah', null, ['class'=>'form-control']) !!}
                <span class="text-helper">{{ $errors->first('alamat_sekolah') }}</span>                       
            </div>

            <br>

            <div class="form-group">
                <label for="my-input">Kontak Telepon Sekolah</label>
                {!! Form::text('kontak_telepon', null, ['class'=>'form-control']) !!}
                <span class="text-helper">{{ $errors->first('kontak_telepon') }}</span>                       
            </div>

            <br>

            <div class="form-group">
                <label for="my-input">Gambar Sekolah <span id="warna1">(Format png - Maks. 5 Mb)</span></label>
                <input type="file" class="form-control" id="gambar_sekolah" name="gambar_sekolah" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                @error('gambar_sekolah')
                    <strong id="warna1">{{ $message }}</strong>
                @enderror 
                <br>
                <img src="" class="img-thumbnail" id="output" width="250">
            </div>

            <div class="form-group">
                {!! Form::submit($tombol, ['class'=>'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</font>
@endauth
@endsection
