@extends('layouts.ahmad_akbar')
@section('ahmad_akbar')
<font face="Nirmala UI Regular">
    @auth()
    <div class="card">
        <div class="card-header">
            <center><h3><b>{{ $judul }}</b></h3></center>
        </div>

        <div class="card-body">

            {!! Form::model($absen, ['route' => $alamat_rute, 'method' => $cara]) !!}
            @csrf

            <div class="form-group">
                <label for="nisn">Pilih Siswa<strong style="color: red; font-weight: bold">*Wajib Dipilih</strong></label>
                {!! Form::select('nisn', $siswa, null, ['class' => 'form-control', 'placeholder' => 'Pilih Siswa']) !!}
            </div>                        

            <br>

            <div class="form-group">
                <label for="my-input">Hadir</label>
                {!! Form::number('hadir', null, ['class'=>'form-control']) !!}
                <span class="text-helper">{{ $errors->first('hadir') }}</span>                       
            </div>

            <br>

            <div class="form-group">
                <label for="my-input">Izin</label>
                {!! Form::number('izin', null, ['class'=>'form-control']) !!}
                <span class="text-helper">{{ $errors->first('izin') }}</span>                       
            </div>

            <br>

            <div class="form-group">
                <label for="my-input">Alpa</label>
                {!! Form::number('alpa', null, ['class'=>'form-control']) !!}
                <span class="text-helper">{{ $errors->first('alpa') }}</span>                       
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
