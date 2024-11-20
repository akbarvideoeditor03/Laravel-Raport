<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class absenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $absensiswa = \App\Models\absens::with('siswa')->orderBy('nisn')->get();
        $data['absensiswa'] = $absensiswa;
        $data['tittle'] = 'Data Absensi Siswa';
        return view('/folder_nilaimapel/absensi', $data);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['siswa'] = \App\Models\siswas::selectRaw("nisn,concat(nisn,' - ',nama_siswa) as tampil")->pluck('tampil','nisn');// Ambil NISN sebagai kunci dan nama sebagai nilai
        $data['absen'] = new \App\Models\absens();
        $data['alamat_rute'] = 'absensiswa.store';
        $data['cara'] = 'post';
        $data['judul'] = 'Insert Absen Siswa';
        $data['tombol'] = 'Simpan';
        return view('/folder_nilaimapel/form_absen', $data);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required',
            'hadir' => '',
            'izin' => '',
            'alpa' => '',
        ]);

        $absen = new \App\Models\absens();
        $absen->nisn = $request->nisn;
        // Tambahkan field absen lainnya sesuai kebutuhan
        $absen->hadir = $request->hadir;
        $absen->izin = $request->izin;
        $absen->alpa = $request->alpa;
        $absen->save();

        flash('Data Absen Berhasil Disimpan');
        return redirect('/absensiswa');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_absensi)
    {
        $data['siswa'] = \App\Models\siswas::selectRaw("nisn,concat(nisn,' - ',nama_siswa) as tampil")->pluck('tampil','nisn');// Ambil NISN sebagai kunci dan nama sebagai nilai
        $data['absen'] = \App\Models\absens::findorfail($id_absensi);
        $data['alamat_rute'] = ['absensiswa.update', $id_absensi];
        $data['cara'] = 'put';
        $data['judul'] = 'Edit Absen Siswa';
        $data['tombol'] = 'Perbarui';
        return view('/folder_nilaimapel/form_absen', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_absensi)
    {
        $request->validate([
            'nisn' => 'required',
            'hadir' => '',
            'izin' => '',
            'alpa' => '',
        ]);

        $absen = \App\Models\absens::findorfail($id_absensi);
        $absen->nisn = $request->nisn;
        $absen->hadir = $request->hadir;
        $absen->izin = $request->izin;
        $absen->alpa = $request->alpa;
        $absen->save();

        flash('Data Absen Berhasil Diperbarui');
        return redirect('/absensiswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id_absensi)
    {
        $absen = \App\Models\absens::findorfail($id_absensi);
        $absen -> delete();
        flash('Data Telah Dihapus')->success();
        return redirect('/absensiswa');
    }
}
