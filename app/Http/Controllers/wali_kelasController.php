<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class wali_kelasController extends Controller
{
    public function index()
    {
        $data['walas']= \App\Models\wali_kelas::all();
        $data['tittle']='Data Wali Kelas 10';
        return view('/folder_walikelas/walikelas', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['walas10'] = new \App\Models\wali_kelas();
        $data['alamat_rute'] = 'walikelas10.store';
        $data['cara'] = 'post';
        $data['judul'] = 'Tambah Data Wali Kelas';
        $data['tombol'] = 'Simpan';
        return view('/folder_walikelas/form_walikelas', $data);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nip_walikelas' => 'required',
            'nama_walikelas' => 'required',
            'nomor_telepon' => 'required',
            'gmbr_ttd_wali_kelas' => 'required|image|mimes:png|max:5000',
        ]);

        // Simpan gambar ke dalam database
        if ($request->hasFile('gmbr_ttd_wali_kelas')) {
            $image = $request->file('gmbr_ttd_wali_kelas');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/gmbr_ttd_wali_kelas', $imageName);
        }

        $walas = new \App\Models\wali_kelas();
        $walas->nip_walikelas = $request->nip_walikelas;
        $walas->nama_walikelas = $request->nama_walikelas;
        $walas->nomor_telepon = $request->nomor_telepon;
        $walas->gmbr_ttd_wali_kelas = $imageName;
        $walas->save();

        flash('Satu langkah lagi! Ayo lengkapi alamatnya sekarang 😊')->success();
        return redirect()->route('walasalamat.alamat', $walas->nip_walikelas)->with('success', 'Satu langkah lagi! Ayo lengkapi alamat sekarang');
    }

    public function alamat(string $nip_walikelas)
    {
        $data['alamat_walas'] = \App\Models\wali_kelas::where('nip_walikelas', $nip_walikelas)->firstOrFail();
        $data['alamat_rute'] = ['walasalamat.storealamat', $nip_walikelas];
        $data['cara'] = 'post';
        $data['judul'] = 'Alamat Wali Kelas';
        $data['tombol'] = 'Simpan';
        return view('/folder_walikelas/form_alamatwalas1', $data);
    }

    public function storealamat(Request $request, string $nip_walikelas)
    {
        $walas = \App\Models\wali_kelas::where('nip_walikelas', $nip_walikelas)->firstOrFail();

        $request->validate([
            'kelurahan_desa' => 'required',
            'kecamatan' => 'required',
            'kabupaten_kota' => 'required',
            'provinsi' => 'required',
        ]);

        $alamat = new \App\Models\alamat_walikelas();
        $alamat->nip_walikelas = $nip_walikelas;
        $alamat->kelurahan_desa = $request->kelurahan_desa;
        $alamat->kecamatan = $request->kecamatan;
        $alamat->kabupaten_kota = $request->kabupaten_kota;
        $alamat->provinsi = $request->provinsi;
        $alamat->save();
        flash('Selamat Data Telah Disimpan Seluruhnya 😊')->success();
        return redirect('/walikelas10');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $nip_walikelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(string $nip_walikelas)
    {
        $data['walas10'] = \App\Models\wali_kelas::where('nip_walikelas', $nip_walikelas)->firstOrFail();
        $data['alamat_rute'] = ['walikelas10.update', $nip_walikelas];
        $data['cara'] = 'put';
        $data['judul'] = 'Edit Data Wali Kelas 10';
        $data['tombol'] = 'Perbarui';
        return view('/folder_walikelas/form_walikelas', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $nip_walikelas)
    {
        $request->validate([
            'nip_walikelas' => 'required',
            'nama_walikelas' => 'required',
            'nomor_telepon' => 'required',
            'gmbr_ttd_wali_kelas' => '',
        ]);

        if ($request->hasFile('gmbr_ttd_wali_kelas')) {
            $image = $request->file('gmbr_ttd_wali_kelas');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/gmbr_ttd_wali_kelas', $imageName);
        }

        // Mengambil data kepala sekolah berdasarkan NIP
        $walikelas = \App\Models\wali_kelas::where('nip_walikelas', $nip_walikelas)->firstOrFail();
        $walikelas->nip_walikelas = $request->nip_walikelas;
        $walikelas->nama_walikelas = $request->nama_walikelas;
        $walikelas->nomor_telepon = $request->nomor_telepon;
        $walikelas->save();

        flash('Data Wali Kelas 10 Berhasil Diperbarui');
        return redirect('/walikelas10');
    }
    
    public function delete(string $nip_walikelas)
    {
        $walikelas = \App\Models\wali_kelas::where('nip_walikelas', $nip_walikelas)->firstOrFail();
        $walikelas->delete();
        flash('Data Telah Dihapus')->success();
        return redirect('/walikelas10');
    }
}
