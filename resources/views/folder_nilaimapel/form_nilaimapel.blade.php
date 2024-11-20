@extends('layouts.ahmad_akbar')
@section('ahmad_akbar')
@auth()
<font face="Nirmala UI Regular">
    <div class="card">
        <div class="card-header">
            <center><h3><b>{{ $judul }}</b></h3></center>
        </div>

        <div class="card-body" id="mainFom">

            {!! Form::model($nilai, [
                'route' => $alamat_rute,
                'method' => $cara,
                'id'=>'form-nilai'
                ]) !!}
                
            @csrf
            <div class="form-group">
                <label for="my-input">NISN</label>
                {!! Form::select('nisn', $nisn, null, ['class'=>'form-control']) !!}
                <span class="text-helper">{{ $errors->first('nisn') }}</span>                       
            </div>

            <br>

            <div class="form-group">
                <label for="my-input">Kode Mata Pelajaran</label>
                {!! Form::select('kode_mapel', $mapel, null, ['class'=>'form-control']) !!}
                <span class="text-helper">{{ $errors->first('kode_mapel') }}</span>                       
            </div>

            <br>

            <div class="form-group">
                <label for="my-input">Nilai Akhir Mata Pelajaran</label>
                {!! Form::number('nilai', null, ['class'=>'form-control']) !!}
                <span class="text-helper">{{ $errors->first('nilai') }}</span>                       
            </div>

            <br>

            <div class="form-group">
                <label for="my-input">Keterangan Belajar Siswa</label>
                {!! Form::textarea('keterangan', null, ['class'=>'form-control']) !!}
                <span class="text-helper">{{ $errors->first('keterangan') }}</span>                       
            </div>

            <hr>

            <div class="form-group">
                {!! Form::submit($tombol, ['class'=>'btn btn-primary']) !!}
                {!! Form::close() !!}
                <a href="{{ url()->previous() }}" class="btn btn-danger">Batal</a>
            </div>

            
        </div>
    </div>
</font>
@endauth
@endsection
