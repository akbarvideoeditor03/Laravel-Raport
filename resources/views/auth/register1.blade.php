@extends('layouts.sekolah')
@section('login-akun')
<font face="Nirmala UI Regular">
    <div class="card">
        <div class="card-header">
            <center><h3><b>{{ $judul }}</b></h3></center>
        </div>

        <div class="card-body">

            {!! Form::model($daftar, ['route' => $kirim, 'method' => $simpan]) !!}
            @csrf

            <div class="form-group">
                <label for="my-input">Nama<strong style="color: red; font-weight: bold">
                    *Wajib Diisi</strong></label>
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
                <span class="text-helper">{{ $errors->first('name') }}</span>                       
            </div>

            <br>

            <div class="form-group">
                <label for="my-input">Nomor ID</label>
                {!! Form::text('email', null, ['class'=>'form-control']) !!}
                <span class="text-helper">{{ $errors->first('') }}</span>                       
            </div>

            
            <br>
            
            <div class="form-group">
                <label for="my-input">Password</label>
                {!! Form::text('password', null, ['class'=>'form-control']) !!}
                <span class="text-helper">{{ $errors->first('password') }}</span>                       
            </div>
            
            <br>

            <div class="form-group">
                <label for="my-input">Konfirmasi Password</label>
                {!! Form::text('konfirmasi_password', null, ['class'=>'form-control']) !!}
                <span class="text-helper">{{ $errors->first('konfirmasi_password') }}</span>                       
            </div>
            
            <br>

            <div class="form-group">
                {!! Form::submit($tombol, ['class'=>'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</font>
@endsection
