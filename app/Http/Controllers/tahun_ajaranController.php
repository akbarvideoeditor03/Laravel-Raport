<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class tahun_ajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['tahun']= \App\Models\tahun_ajarans::all();
        $data['tittle']='Tahun Ajaran Sekolah';
        return view('/folder_tahunajaran/tahunajaran', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['tahun'] = new \App\Models\tahun_ajarans();
        $data['alamat_rute'] = 'tahunajaransekolah.store';
        $data['cara'] = 'post';
        $data['judul'] = 'Tambah Data Tahun Ajaran Sekolah';
        $data['tombol'] = 'Simpan';
        return view('/folder_tahunajaran/form_tahunajaran', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tahun1' => '',
            'tahun2' => '',
            'semester' => 'required',
        ]);

        $tahunajaran = new \App\Models\tahun_ajarans();
        $tahunajaran->tahun1 = $request->tahun1; // Simpan password yang sudah di-hash
        $tahunajaran->tahun2 = $request->tahun2;
        $tahunajaran->semester = $request->semester;
        $tahunajaran->save();

        flash('Data Tahun Ajaran Berhasil Disimpan');
        return redirect('/tahunajaransekolah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $kode_tahunajaran)
    {
        $data['tahun'] = \App\Models\tahun_ajarans::where('kode_tahunajaran', $kode_tahunajaran)->firstOrFail();
        $data['alamat_rute'] = ['tahunajaransekolah.update', $kode_tahunajaran];
        $data['cara'] = 'put';
        $data['judul'] = 'Edit Data Tahun Ajaran Sekolah';
        $data['tombol'] = 'Perbarui';
        return view('/folder_tahunajaran/form_tahunajaran', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $kode_tahunajaran)
    {
        $request->validate([
            'tahun1' => '',
            'tahun2' => '',
            'semester' => 'required',
        ]);

        $tahunajaran = \App\Models\tahun_ajarans::where('kode_tahunajaran', $kode_tahunajaran)->firstOrFail();
        $tahunajaran->tahun1 = $request->tahun1; // Simpan password yang sudah di-hash
        $tahunajaran->tahun2 = $request->tahun2;
        $tahunajaran->semester = $request->semester;
        $tahunajaran->save();

        flash('Data Tahun Ajaran Berhasil Diperbarui');
        return redirect('/tahunajaransekolah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
