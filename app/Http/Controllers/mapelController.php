<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['mapel']= \App\Models\tabel_matapelajarans::all();
        $data['tittle']='Data-Data Mata Pelajaran Kelas 10';
        return view('/folder_mapel/daftar_matapelajaran', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['mapel10'] = new \App\Models\tabel_matapelajarans();
        $data['alamat_rute'] = 'mapelkelas10.store';
        $data['cara'] = 'post';
        $data['judul'] = 'Tambah Data Mata Pelajaran';
        $data['tombol'] = 'Simpan';
        return view('/folder_mapel/form_matapelajaran', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_mapel' => 'required',
            'nama_mapel' => 'required',
        ]);

        $mapel10 = new \App\Models\tabel_matapelajarans();
        $mapel10->kode_mapel = $request->kode_mapel;
        $mapel10->nama_mapel = $request->nama_mapel;
        $mapel10->save();

        flash('Data Mata Pelajaran Berhasil Disimpan');
        return redirect('/mapelkelas10');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $kode_mapel)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $kode_mapel)
    {
        $data['mapel10'] = \App\Models\tabel_matapelajarans::where('kode_mapel', $kode_mapel)->firstorfail();
        $data['alamat_rute'] = ['mapelkelas10.update', $kode_mapel];
        $data['cara'] = 'put';
        $data['judul'] = 'Edit Data Mata Pelajaran';
        $data['tombol'] = 'Perbarui';
        return view('/folder_mapel/form_matapelajaran', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $kode_mapel)
    {
        $request->validate([
            'kode_mapel' => 'required',
            'nama_mapel' => 'required',
        ]);

        $mapel10 = \App\Models\tabel_matapelajarans::where('kode_mapel', $kode_mapel)->firstorfail();
        $mapel10->kode_mapel = $request->kode_mapel;
        $mapel10->nama_mapel = $request->nama_mapel;
        $mapel10->save();

        flash('Data Mata Pelajaran Berhasil Diperbarui');
        return redirect('/mapelkelas10');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $kode_mapel)
    {
        $mapel10 = \App\Models\tabel_matapelajarans::where('kode_mapel', $kode_mapel)->firstOrFail();
        $mapel10->delete();
        flash('Data Mata Pelajaran Telah Dihapus')->success();
        return redirect('/mapelkelas10');
    }
}
