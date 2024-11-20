@extends('layouts.ahmad_akbar')
@section('ahmad_akbar')
<font face="Nirmala UI Regular">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color: rgb(241, 241, 241)"><h4><b><center>{{ __("Selamat Datang ")}}{{ Auth::user()->name }}</center></b></h4></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Anda Berhasil Masuk!') }}
                </div>
            </div>
        </div>
    </div>
</div>
</font>
@endsection
