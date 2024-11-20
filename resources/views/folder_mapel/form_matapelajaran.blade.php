@extends('layouts.ahmad_akbar')
@section('ahmad_akbar')
<font face="Nirmala UI Regular">
    @auth()
    <div class="card">
        <div class="card-header">
            <center><h3><b>{{ $judul }}</b></h3></center>
        </div>

        <div class="card-body">

            {!! Form::model($mapel10, ['route' => $alamat_rute, 'method' => $cara]) !!}
            @csrf
            <div class="form-group">
                <label for="my-input">Kode Mapel<strong style="color: red; font-weight: bold">
                    *Wajib Diisi</strong></label>
                {!! Form::text('kode_mapel', null, ['class'=>'form-control']) !!}
                <span class="text-helper">{{ $errors->first('kode_mapel') }}</span>                       
            </div>

            <br>

            <div class="form-group">
                <label for="my-input">Nama Mata Pelajaran<strong style="color: red; font-weight: bold">
                    *Wajib Diisi</strong></label>
                {!! Form::text('nama_mapel', null, ['class'=>'form-control']) !!}
                <span class="text-helper">{{ $errors->first('nama_mapel') }}</span>                       
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
