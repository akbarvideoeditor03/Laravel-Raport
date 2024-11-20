@extends('layouts.ahmad_akbar')
@section('ahmad_akbar')
<font face="Nirmala UI Regular">
    @auth()
    <div class="card">
        <div class="card-header">
            <center><h3><b>{{ $judul }}</b></h3></center>
        </div>

        <div class="card-body">

            {!! Form::model($walas10, ['route' => $alamat_rute, 'method' => $cara, 'enctype' => 'multipart/form-data', 'id' => 'imageForm']) !!}
            @csrf

            <div class="form-group">
                <label for="my-input">NIP<strong style="color: red; font-weight: bold">
                    *Wajib Diisi</strong></label>
                {!! Form::text('nip_walikelas', null, ['class'=>'form-control']) !!}
                <span class="text-helper">{{ $errors->first('nip_walikelas') }}</span>                       
            </div>

            <br>

            <div class="form-group">
                <label for="my-input">Nama Wali Kelas 10</label>
                {!! Form::text('nama_walikelas', null, ['class'=>'form-control']) !!}
                <span class="text-helper">{{ $errors->first('nama_walikelas') }}</span>                       
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
                <input type="file" class="form-control" id="gmbr_ttd_wali_kelas" name="gmbr_ttd_wali_kelas" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                @error('gmbr_ttd_wali_kelas')
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
