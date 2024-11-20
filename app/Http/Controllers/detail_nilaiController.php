<?php

namespace App\Http\Controllers;

use App\Models\nilai_mapels;
use Illuminate\Http\Request;

class detail_nilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function detailnilai($nisn)
    {
        $datanilai = nilai_mapels::where('nisn', $nisn)->get();
        $siswa = \App\Models\siswas::where('nisn', $nisn)->first();
        $data['detailnilai'] = $datanilai;
        $data['judul'] = 'Detail Nilai ' . $siswa['nama_siswa'];
        return view('/folder_nilaimapel/detail_nilai', $data);
    }

    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(detail_nilaiController $detail_nilaiController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $nisn)
    {
        $editNilai = \App\Models\nilai_mapels::where('nisn', $nisn)->firstOrFail();
        $daftarMapel = \App\Models\tabel_matapelajarans::where('kode_mapel', $editNilai->kode_mapel)->firstOrFail();

        $data['editnilai'] = $editNilai;
        $data['daftarmapel'] = $daftarMapel;
        $data['alamat_rute'] = ['detailnilai.update', $nisn];
        $data['cara'] = 'put';
        $data['judul'] = 'Edit Nilai ' . $daftarMapel->nama_mapel;
        $data['tombol'] = 'Perbarui';

        return view('/folder_nilaimapel/form_detailnilai', $data);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, detail_nilaiController $detail_nilaiController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(detail_nilaiController $detail_nilaiController)
    {
        //
    }
}
