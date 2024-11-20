@extends('layouts.ahmad_akbar')
@section('ahmad_akbar')
@auth()
<font face="Nirmala UI Regular">
    <div class="card">
        <div class="card-header">
            <center><h3><b>{{ $judul }}</b></h3></center>
        </div>

        <div class="card-body">

            {!! Form::model($kpsbaru, ['route' => $alamat_controller, 'method' => $cara, 'enctype' => 'multipart/form-data', 'id' => 'imageForm']) !!}
            @csrf

            <div class="form-group">
                <label for="my-input">NIP</label>
                {!! Form::text('nip_kepalasekolah', null, ['class'=>'form-control']) !!}
                <span class="text-helper">{{ $errors->first('nip_kepalasekolah') }}</span>                       
            </div>

            <br>

            <div class="form-group">
                <label for="my-input">Nama</label>
                {!! Form::text('nama_kepalasekolah', null, ['class'=>'form-control']) !!}
                <span class="text-helper">{{ $errors->first('nama_kepalasekolah') }}</span>                       
            </div>

            <br>
            <div class="form-group">
                <label for="my-input">Alamat Kepala Sekolah</label>
                {!! Form::text('alamat_kepalasekolah', null, ['class'=>'form-control']) !!}
                <span class="text-helper">{{ $errors->first('alamat_kepalasekolah') }}</span>                       
            </div>
            <br>

            <div class="form-group">
                <label for="my-input">Nomor Telepon</label>
                {!! Form::text('nomor_telepon', null, ['class'=>'form-control']) !!}
                <span class="text-helper">{{ $errors->first('nomor_telepon') }}</span>                       
            </div>

            <br>

            <div class="form-group">
                <label for="my-input">Gambar Tanda Tangan <span id="warna1">(Format png - Maks. 5 Mb)</span></label>
                <input type="file" class="form-control" id="gambar_ttd_tangan" name="gambar_ttd_tangan" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                @error('gambar_ttd_tangan')
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
</font>
@endauth
@endsection
