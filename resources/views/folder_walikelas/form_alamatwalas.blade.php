@extends('layouts.ahmad_akbar')
@section('ahmad_akbar')
<font face="Nirmala UI Regular">
    @auth()
    <div class="card">
        <div class="card-header">
            <center><h3><b>{{ $judul }}</b></h3></center>
        </div>

        <div class="card-body">

            {!! Form::model($alamat_walas, ['route' => $alamat_rute, 'method' => $cara]) !!}
            @csrf

            <div class="form-group">
                <label for="my-input">NIP Wali Kelas</label>
                {!! Form::select('nip_walikelas', $walas, null, ['class'=>'form-control']) !!}
                <span class="text-helper">{{ $errors->first('nip_walikelas') }}</span>                       
            </div>

            <br>

            <div class="form-group">
                <label for="my-input">Desa / Kelurahan</label>
                {!! Form::text('kelurahan_desa', null, ['class'=>'form-control']) !!}
                <span class="text-helper">{{ $errors->first('kelurahan_desa') }}</span>                       
            </div>

            <br>

            <div class="form-group">
                <label for="my-input">Kecamatan</label>
                {!! Form::text('kecamatan', null, ['class'=>'form-control']) !!}
                <span class="text-helper">{{ $errors->first('kecamatan') }}</span>                       
            </div>

            <br>

            <div class="form-group">
                <label for="my-input">Kabupaten / Kota</label>
                {!! Form::text('kabupaten_kota', null, ['class'=>'form-control']) !!}
                <span class="text-helper">{{ $errors->first('kabupaten_kota') }}</span>                       
            </div>

            <br>

            <div class="form-group">
                <label for="my-input">Provinsi</label>
                {!! Form::text('provinsi', null, ['class'=>'form-control']) !!}
                <span class="text-helper">{{ $errors->first('provinsi') }}</span>                       
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

