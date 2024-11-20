@extends('layouts.ahmad_akbar')
@section('ahmad_akbar')
<font face="Nirmala UI Regular">
    @auth()
    <div class="card">
        <div class="card-header">
            <center><h3><b>{{ $judul }}</b></h3></center>
        </div>

        <div class="card-body">

            {!! Form::model($tahun, ['route' => $alamat_rute, 'method' => $cara]) !!}
            @csrf
            <div class="form-group">
                <label for="my-input">Tahun Ajaran Pertama</label>
                {!! Form::date('tahun1', null, ['class'=>'form-control']) !!}
                <span class="text-helper">{{ $errors->first('tahun1') }}</span>                       
            </div>

            <br>

            <div class="form-group">
                <label for="my-input">Tahun Ajaran Kedua</label>
                {!! Form::date('tahun2', null, ['class'=>'form-control']) !!}
                <span class="text-helper">{{ $errors->first('tahun2') }}</span>                       
            </div>

            <br>

            <div class="form-group">
                <label for="my-input">Semester</label>
                {!! Form::number('semester', null, ['class'=>'form-control']) !!}
                <span class="text-helper">{{ $errors->first('semester') }}</span>                       
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
