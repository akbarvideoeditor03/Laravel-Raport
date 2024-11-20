<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class alamatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['siswa'] = \App\Models\alamat_siswa::with('siswa')->orderBy('nisn')->get();
        $data['alamat'] = \App\Models\alamat_siswa::all();
        $data['judul'] = 'Daftar Alamat Siswa';
        return view ('folder_siswa/daftaralamat', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['siswa'] = \App\Models\siswas::selectRaw("nisn,concat(nisn,' - ',nama_siswa) as tampil")->pluck('tampil','nisn');// Ambil NISN sebagai kunci dan nama sebagai nilai
        $data['alamat_siswa'] = new \App\Models\absens();
        $data['alamat_rute'] = 'daftaralamat.store';
        $data['cara'] = 'post';
        $data['judul'] = 'Tambah Alamat Siswa';
        $data['tombol'] = 'Simpan';
        return view('/folder_siswa/form_alamatsiswa1', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required',
            'kelurahan_desa' => 'required',
            'kecamatan' => 'required',
            'kabupaten_kota' => 'required',
            'provinsi' => 'required',
        ]);

        $alamat= new \App\Models\alamat_siswa();
        $alamat->nisn = $request->nisn;
        $alamat->kelurahan_desa = $request->kelurahan_desa;
        $alamat->kecamatan = $request->kecamatan;
        $alamat->kabupaten_kota = $request->kabupaten_kota;
        $alamat->provinsi = $request->provinsi;
        $alamat->save();
        flash('Data Alamat Telah Disimpan 😊')->success();
        return redirect('/daftaralamat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_alamatsiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_alamatsiswa)
    {
        $data['alamat_siswa'] = \App\Models\alamat_siswa::where('id_alamatsiswa', $id_alamatsiswa)->firstorfail();
        $data['judul'] = 'Edit Alamat Siswa';
        $data['alamat_rute'] = ['daftaralamat.update', $id_alamatsiswa];
        $data['cara'] = 'put';
        $data['tombol'] = 'Perbarui';
        return view ('folder_siswa/form_alamatsiswa', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_alamatsiswa)
    {
        $request->validate([
            'kelurahan_desa' => 'required',
            'kecamatan' => 'required',
            'kabupaten_kota' => 'required',
            'provinsi' => 'required',
        ]);

        $alamat = \App\Models\alamat_siswa::where('id_alamatsiswa', $id_alamatsiswa)->firstorfail();
        $alamat->kelurahan_desa = $request->kelurahan_desa;
        $alamat->kecamatan = $request->kecamatan;
        $alamat->kabupaten_kota = $request->kabupaten_kota;
        $alamat->provinsi = $request->provinsi;
        $alamat->save();

        flash('Data Alamat Berhasil Diperbarui');
        return redirect('/daftaralamat');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id_alamatsiswa)
    {
        $data['delete'] = \App\Models\alamat_siswa::where('id_alamatsiswa', $id_alamatsiswa)->firstorfail();
        $data['delete']->delete();
        flash('Data Alamat Berhasil Dihapus');
        return redirect('/daftaralamat');
    }
}
