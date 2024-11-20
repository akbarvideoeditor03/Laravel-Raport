@extends('layouts.ahmad_akbar')
@section('ahmad_akbar')
@auth()
    <div class="card">
        <div class="card-header" id="imgdashboard" style="height: 7.5cm">
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <a href="/walikelas10" class="btn btn-primary" style="width: 95%">Data Wali Kelas</a>
                </div>
                <div class="col-3">
                    <a href="/datasiswa" class="btn btn-primary" style="width: 95%">Data Siswa Kelas 10</a>
                </div>
                <div class="col-3">
                    <a href="/mapelkelas10" class="btn btn-primary" style="width: 95%">Data Mata Pelajaran Kelas 10</a>
                </div>
                <div class="col-3">
                    <a href="/nilaikelas10" class="btn btn-primary" style="width: 95%">Data Nilai Siswa Kelas 10</a>
                </div>
            </div>
        </div>
    </div>
@endauth
@endsection