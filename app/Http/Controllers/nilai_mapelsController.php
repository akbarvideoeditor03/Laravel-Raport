<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nilai_mapels;

class nilai_mapelsController extends Controller
{
    public function index()
    {
        $daftarmapel = \App\Models\nilai_mapels::with('mapel')->get();
        $daftarsiswa = \App\Models\nilai_mapels::with('siswa')->orderby('nisn')->get();
        $sswa = \App\Models\nilai_mapels::with('siswa')->get()->all();

        $data['mapel'] = $daftarmapel;
        $data['nilai_siswa'] = $daftarsiswa;
        $data['siswa'] = $sswa;

        $daftarNilai = \App\Models\nilai_mapels::select('nisn', \DB::raw('AVG(nilai) as nilai_rata_rata'))
            ->groupBy('nisn')
            ->get();

        $data['nilai_rata_rata'] = $daftarNilai;

        $data['judulsiswa'] = 'Daftar Nilai Siswa Kelas 10';
        $data['tittle'] = 'Nilai';

        return view('/folder_nilaimapel/nilaimapel', $data);

    }

    public function detailnilai($nisn)
    {
        $datanilai = nilai_mapels::where('nisn', $nisn)->orderby('kode_mapel')->get();
        $siswa = \App\Models\siswas::where('nisn', $nisn)->first();
        $data['detailnilai'] = $datanilai;
        $data['judul'] = 'Detail Nilai ' . $siswa['nama_siswa'];
        return view('/folder_nilaimapel/detail_nilai', $data);
    }


    
    public function create()
    {
        $data['nisn'] = \App\Models\siswas::selectRaw("nisn, concat(nisn,' - ',nama_siswa) as tampil")->pluck('tampil','nisn');
        $data['mapel'] = \App\Models\tabel_matapelajarans::selectRaw("kode_mapel, concat(kode_mapel,' - ',nama_mapel) as tampil")->pluck('tampil','kode_mapel');
        $data['nilai'] = new \App\Models\nilai_mapels();
        $data['alamat_rute'] = 'nilaikelas10.store';
        $data['cara'] = 'post';
        $data['judul'] = 'Tambah Data Nilai Siswa';
        $data['tombol'] = 'Simpan';
        
        return view('/folder_nilaimapel/form_nilaimapel', $data);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required',
            'kode_mapel' => 'required',
            'nilai' => 'required',
            'keterangan' => 'required',
        ], [
            'nisn.required' => 'Kolom NISN harus diisi.',
            'kode_mapel.required' => 'Kolom Kode Mapel harus diisi.',
            'nilai.required' => 'Kolom Nilai harus diisi.',
            'keterangan.required' => 'Kolom Keterangan harus diisi.',
        ]);
        
        $existingData = \App\Models\nilai_mapels::where('nisn', $request->nisn)
            ->where('kode_mapel', $request->kode_mapel)
            ->exists();
            
        
        if ($existingData) {
            flash('Data Yang Anda Masukkan Sudah Ada. Klik NISN Untuk Melihat', 'danger');
            return redirect('/nilaikelas10');
        }
        
        $nilaimapel = new \App\Models\nilai_mapels();
        $nilaimapel->nisn = $request->nisn;
        $nilaimapel->kode_mapel = $request->kode_mapel;
        $nilaimapel->nilai = $request->nilai;
        $nilaimapel->keterangan = $request->keterangan;
        $nilaimapel->save();
        
        flash('Data Nilai Berhasil Disimpan');
        return redirect('/nilaikelas10');
        
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
    public function edit(string $kode_nilai_mapel)
    {
        $data['nisn'] = \App\Models\siswas::selectRaw("nisn, concat(nisn,' - ',nama_siswa) as tampil")->pluck('tampil','nisn');
        $data['mapel'] = \App\Models\tabel_matapelajarans::selectRaw("kode_mapel, concat(kode_mapel,' - ',nama_mapel) as tampil")->pluck('tampil','kode_mapel');
        $data['nilai'] = \App\Models\nilai_mapels::where('kode_nilai_mapel', $kode_nilai_mapel)->firstOrFail();
        $data['alamat_rute'] = ['detailnilai.update', $kode_nilai_mapel];
        $data['cara'] = 'put';
        $data['judul'] = 'Edit Data Nilai';
        $data['tombol'] = 'Perbarui';
        
        return view('/folder_nilaimapel/form_nilaimapel', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $kode_nilai_mapel)
    {
        $request->validate([
            'nisn' => 'required',
            'kode_mapel' => 'required',
            'nilai' => 'required',
            'keterangan' => 'required',
        ], [
            'nisn.required' => 'Kolom NISN harus diisi.',
            'kode_mapel.required' => 'Kolom Kode Mapel harus diisi.',
            'nilai.required' => 'Kolom Nilai harus diisi.',
            'keterangan.required' => 'Kolom Keterangan harus diisi.',
        ]);
        $nilaimapel = \App\Models\nilai_mapels::where('kode_nilai_mapel', $kode_nilai_mapel)->firstOrFail();
        $nilaimapel->nisn = $request->nisn;
        $nilaimapel->kode_mapel = $request->kode_mapel;
        $nilaimapel->nilai = $request->nilai;
        $nilaimapel->keterangan = $request->keterangan;
        $nilaimapel->save();
        
        flash('Data Nilai Berhasil Diperbarui');
        return redirect('/nilaikelas10');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $kode_nilai_mapel)
    {
        $hapus = \App\Models\nilai_mapels::where('kode_nilai_mapel', $kode_nilai_mapel)->firstOrFail();
        $hapus->delete();
        flash('Data Telah Dihapus')->success();
        return redirect('/nilaikelas10');
    }
}
