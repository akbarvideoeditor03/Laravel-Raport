@extends('layouts.ahmad_akbar')
@section('ahmad_akbar')
<font face="Nirmala UI Regular">
    <div class="card">
        <div class="card-body">

            <div class="row justify-content-start">
                <center>
                    <h4><b>{{ $title }}</b></h4>
                </center>
            </div>
            <hr>
            
            @foreach ($kps as $k)
            <div class="row">
                <div class="col-xl-12">
                    <div class="row">
                        <h5>
                            <table class="">
                                <tbody class="">
                                    <tr>
                                        <td id="pdd">NIP</td>
                                        <td id="pdd">:</td>
                                        <td id="pdd">{{ $k->nip_kepalasekolah }}</td>
                                    </tr>
    
                                    <tr>
                                        <td id="pdd">Nama</td>
                                        <td id="pdd">:</td>
                                        <td id="pdd">{{ $k->nama_kepalasekolah }}</td>
                                    </tr>
            
                                    <tr>
                                        <td id="pdd">Alamat</td>
                                        <td id="pdd">:</td>
                                        <td id="pdd">{{ $k->alamat_kepalasekolah }}</td>
                                    </tr>
            
                                    <tr>
                                        <td id="pdd">Nomor Telepon</td>
                                        <td id="pdd">:</td>
                                        <td id="pdd">{{ $k->nomor_telepon }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</font>
@endsection
