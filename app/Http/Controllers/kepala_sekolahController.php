<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class kepala_sekolahController extends Controller
{
    
    public function index()
    {
        $data['kps']= \App\Models\kepala_sekolahs::all();
        $data['title']='Data Kepala Sekolah';
        return view('/folder_kepsek/kepala_sekolah', $data);
    }

    public function index1()
    {
        $data['kps']= \App\Models\kepala_sekolahs::all();
        $data['title']='Data Kepala Sekolah';
        return view('/folder_kepsek/kepala_sekolah_umum', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['kpsbaru'] = new \App\Models\kepala_sekolahs();
        $data['alamat_controller'] = 'kepalasekolah.store';
        $data['cara'] = 'post';
        $data['judul'] = 'Tambah Data Kepala Sekolah';
        $data['tombol'] = 'Simpan';
        return view('/folder_kepsek/form_kepala_sekolah', $data);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nip_kepalasekolah' => 'required',
            'nama_kepalasekolah' => 'required',
            'alamat_kepalasekolah' => 'required',
            'nomor_telepon' => 'required',
            'gambar_ttd_tangan' => 'required|image|mimes:png|max:5000',
        ]);

        // Simpan gambar ke dalam database
        if ($request->hasFile('gambar_ttd_tangan')) {
            $image = $request->file('gambar_ttd_tangan');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/gambar_ttd_tangan', $imageName);
        }

        $kpsbaru = new \App\Models\kepala_sekolahs();
        $kpsbaru->nip_kepalasekolah = $request->nip_kepalasekolah;
        $kpsbaru->nama_kepalasekolah = $request->nama_kepalasekolah;
        $kpsbaru->alamat_kepalasekolah = $request->alamat_kepalasekolah;
        $kpsbaru->nomor_telepon = $request->nomor_telepon;
        $kpsbaru->gambar_ttd_tangan = $imageName;
        $kpsbaru->save();

        flash('Data Kepala Sekolah Berhasil Disimpan');
        return redirect('/kepalasekolah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $nip_kepalasekolah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $nip_kepalasekolah)
    {
        $data['kpsbaru'] = \App\Models\kepala_sekolahs::where('nip_kepalasekolah', $nip_kepalasekolah)->firstOrFail();
        $data['alamat_controller'] = ['kepalasekolah.update', $nip_kepalasekolah];
        $data['cara'] = 'put';
        $data['judul'] = 'Edit Data Kepala Sekolah';
        $data['tombol'] = 'Perbarui';
        return view('/folder_kepsek/form_kepala_sekolah', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $nip_kepalasekolah)
    {
        $request->validate([
            'nip_kepalasekolah' => 'required',
            'nama_kepalasekolah' => 'required',
            'alamat_kepalasekolah' => 'required',
            'nomor_telepon' => 'required',
            'gambar_ttd_tangan' => '',
        ]);

        if ($request->hasFile('gambar_ttd_tangan')) {
            $image = $request->file('gambar_ttd_tangan');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/gambar_ttd_tangan', $imageName);
            $kpsbaru->gambar_ttd_tangan = $imageName;
        }

        // Mengambil data kepala sekolah berdasarkan NIP
        $kpsbaru = \App\Models\kepala_sekolahs::where('nip_kepalasekolah', $nip_kepalasekolah)->firstOrFail();

        $kpsbaru->nip_kepalasekolah = $request->nip_kepalasekolah;
        $kpsbaru->nama_kepalasekolah = $request->nama_kepalasekolah;
        $kpsbaru->alamat_kepalasekolah = $request->alamat_kepalasekolah;
        $kpsbaru->nomor_telepon = $request->nomor_telepon;
        $kpsbaru->save();

        flash('Data Kepala Sekolah Berhasil Disimpan');
        return redirect('/kepalasekolah');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $nip_kepalasekolah)
    {
        $kpsbaru = \App\Models\kepala_sekolahs::where('nip_kepalasekolah', $nip_kepalasekolah)->firstOrFail();
        $kpsbaru->delete();
        flash('Data Telah Dihapus')->success();
        return redirect('/kepalasekolah'); // Ganti ke rute yang sesuai
    }
}
