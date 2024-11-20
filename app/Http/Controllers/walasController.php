<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class walasController extends Controller
{
    public function index()
    {
        $data['walas'] = \App\Models\alamat_walikelas::with('walas')->orderBy('nip_walikelas')->get();
        $data['alamat'] = \App\Models\alamat_walikelas::all();
        $data['judul'] = 'Daftar Alamat Wali Kelas';
        return view ('folder_walikelas/daftaralamat', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['walas'] = \App\Models\wali_kelas::selectRaw("nip_walikelas,concat(nip_walikelas,' - ',nama_walikelas) as tampil")->pluck('tampil','nip_walikelas');// Ambil NISN sebagai kunci dan nama sebagai nilai
        $data['alamat_walas'] = new \App\Models\alamat_walikelas();
        $data['alamat_rute'] = 'walasalamat.store';
        $data['cara'] = 'post';
        $data['judul'] = 'Tambah Alamat Wali Kelas';
        $data['tombol'] = 'Simpan';
        return view('/folder_walikelas/form_alamatwalas', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nip_walikelas' => 'required',
            'kelurahan_desa' => 'required',
            'kecamatan' => 'required',
            'kabupaten_kota' => 'required',
            'provinsi' => 'required',
        ]);

        $alamat= new \App\Models\alamat_walikelas();
        $alamat->nip_walikelas = $request->nip_walikelas;
        $alamat->kelurahan_desa = $request->kelurahan_desa;
        $alamat->kecamatan = $request->kecamatan;
        $alamat->kabupaten_kota = $request->kabupaten_kota;
        $alamat->provinsi = $request->provinsi;
        $alamat->save();
        flash('Data Alamat Telah Disimpan 😊')->success();
        return redirect('/walasalamat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_alamatwalas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_alamatwalas)
    {
        $data['alamat_walas'] = \App\Models\alamat_walikelas::where('id_alamatwalas', $id_alamatwalas)->firstorfail();
        $data['judul'] = 'Edit Alamat Siswa';
        $data['alamat_rute'] = ['walasalamat.update', $id_alamatwalas];
        $data['cara'] = 'put';
        $data['tombol'] = 'Perbarui';
        return view ('folder_walikelas/form_alamatwalas1', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_alamatwalas)
    {
        $request->validate([
            'kelurahan_desa' => 'required',
            'kecamatan' => 'required',
            'kabupaten_kota' => 'required',
            'provinsi' => 'required',
        ]);

        $alamat = \App\Models\alamat_walikelas::where('id_alamatwalas', $id_alamatwalas)->firstorfail();
        $alamat->kelurahan_desa = $request->kelurahan_desa;
        $alamat->kecamatan = $request->kecamatan;
        $alamat->kabupaten_kota = $request->kabupaten_kota;
        $alamat->provinsi = $request->provinsi;
        $alamat->save();

        flash('Data Alamat Berhasil Diperbarui');
        return redirect('/walasalamat');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id_alamatwalas)
    {
        $data['delete'] = \App\Models\alamat_walikelas::where('id_alamatwalas', $id_alamatwalas)->firstorfail();
        $data['delete']->delete();
        flash('Data Alamat Berhasil Dihapus');
        return redirect('/walasalamat');
    }
}
