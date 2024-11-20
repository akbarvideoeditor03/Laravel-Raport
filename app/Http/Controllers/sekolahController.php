<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class sekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sekolah = \App\Models\sekolahs::with('kepala_sekolah')->get();
        $data['sekolah'] = $sekolah;
        $data['judul']='Tentang Sekolah';
        return view('/folder_sekolah/sekolah', $data);
    }

    public function index1()
    {
        $sekolah = \App\Models\sekolahs::with('kepala_sekolah')->get();
        $data['sekolah'] = $sekolah;
        $data['judul']='Tentang Sekolah';
        return view('/folder_sekolah/sekolah_umum', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['kepsek'] = \App\Models\kepala_sekolahs::selectRaw("nip_kepalasekolah,concat(nip_kepalasekolah,' - ',nama_kepalasekolah) as tampil")->pluck('tampil','nip_kepalasekolah');
        $data['sekolahbaru'] = new \App\Models\sekolahs();
        $data['alamat_rute'] = 'school.store';
        $data['cara'] = 'post';
        $data['judul'] = 'Tambah Data Sekolah';
        $data['tombol'] = 'Simpan';
        return view('/folder_sekolah/form_sekolah', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'npsn' => 'required',
            'nama_sekolah' => 'required',
            'kontak_telepon' => 'required',
            'alamat_sekolah' => 'required',
            'gambar_sekolah' => 'required|image|mimes:jpeg,png,jpg|max:5000',
        ]);


        if ($request->hasFile('gambar_sekolah')) {
            $image = $request->file('gambar_sekolah');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/gambar_sekolah', $imageName);
        }

        $sekolah = new \App\Models\sekolahs();
        $sekolah->npsn = $request->npsn;
        $sekolah->nama_sekolah = $request->nama_sekolah;
        $sekolah->alamat_sekolah = $request->alamat_sekolah;
        $sekolah->kontak_telepon = $request->kontak_telepon;
        $sekolah->gambar_sekolah = $imageName;
        $sekolah->save();

        flash('Data Sekolah Berhasil Disimpan');
        return redirect('/school');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $npsn)
    {
        $data['kepsek'] = \App\Models\kepala_sekolahs::selectRaw("nip_kepalasekolah, concat(nip_kepalasekolah,' - ',nama_kepalasekolah) as tampil")->pluck('tampil','nip_kepalasekolah');
        $data['sekolahbaru'] = \App\Models\sekolahs::where('npsn', $npsn)->firstorfail();
        $data['alamat_rute'] = ['school.update', $npsn];
        $data['cara'] = 'put';
        $data['judul'] = 'Edit Data Sekolah';
        $data['tombol'] = 'Perbarui';
        return view('/folder_sekolah/form_sekolah', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $npsn)
    {
        $request->validate([
            'npsn' => 'required',
            'nama_sekolah' => 'required',
            'alamat_sekolah' => 'required',
            'kontak_telepon' => 'required',
            'gambar_sekolah' => '',
        ]);

        if ($request->hasFile('gambar_sekolah')) {
            $image = $request->file('gambar_sekolah');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/gambar_sekolah', $imageName);
            $sekolah->gambar_sekolah = $imageName;
        }

        $sekolah = \App\Models\sekolahs::where('npsn', $npsn)->firstOrFail();
        $sekolah->npsn = $request->npsn;
        $sekolah->nama_sekolah = $request->nama_sekolah;
        $sekolah->alamat_sekolah = $request->alamat_sekolah;
        $sekolah->kontak_telepon = $request->kontak_telepon;
        $sekolah->save();

        flash('Data Sekolah Berhasil Disimpan');
        return redirect('/school');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $npsn)
    {
        $sekolah = \App\Models\sekolahs::where('npsn', $npsn)->firstOrFail();
        $sekolah->delete();
        flash('Data Telah Dihapus')->success();
        return redirect('/school'); // Ganti ke rute yang sesuai
    }
}
