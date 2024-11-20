<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\absens;
use App\Models\siswas;
use App\Models\raports;
use App\Models\nilai_mapels;
use Illuminate\Support\Facades\DB;

class raportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*$siswa = \App\Models\raports::with('siswa')->orderBy('nisn')->get();
        $data['rapors'] = $siswa;

        $tahun = \App\Models\raports::with('thn_ajaran')->get();
        $data['rapors'] = $tahun;

        $sekolah = \App\Models\raports::with('sekolah')->get();
        $data['rapors'] = $sekolah;

        $nilai_mapel = \App\Models\raports::with('nilai')->get();
        $data['rapors'] = $nilai_mapel;

        $abs = \App\Models\raports::with('absen')->get();
        $data['rapors'] = $abs;

        $walas = \App\Models\raports::with('walikelas')->get();
        $data['rapors'] = $walas;

        $kepsek = \App\Models\raports::with('kepalasekolah')->get();
        $data['rapors'] = $kepsek;*/

        $data['rapors'] = \App\Models\raports::orderBy('nisn')->get();
        $data['tittle'] = 'Daftar Siswa Yang Sudah Memiliki Raport';
        return view('/folder_raport/raportkelas10', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['siswa'] = \App\Models\siswas::selectRaw("nisn,concat(nisn,' - ',nama_siswa) as tampil")->pluck('tampil','nisn');

        $data['tahun'] = \App\Models\tahun_ajarans::selectRaw("kode_tahunajaran,concat(kode_tahunajaran) as tampil")->pluck('tampil','kode_tahunajaran');

        $data['sekolah'] = \App\Models\sekolahs::selectRaw("npsn,concat(npsn,' - ',nama_sekolah) as tampil")->pluck('tampil','npsn');
        
        $data['absen'] = \App\Models\absens::selectRaw("id_absensi,concat(id_absensi,' - ',nisn) as tampil")->pluck('tampil','id_absensi');
        
        $data['walas'] = \App\Models\wali_kelas::selectRaw("nip_walikelas,concat(nip_walikelas,' - ',nama_walikelas) as tampil")->pluck('tampil','nip_walikelas');

        $data['kepsek'] = \App\Models\kepala_sekolahs::selectRaw("nip_kepalasekolah,concat(nip_kepalasekolah,' - ',nama_kepalasekolah) as tampil")->pluck('tampil','nip_kepalasekolah');

        $data['nilai'] = \App\Models\nilai_mapels::selectRaw("kode_nilai_mapel, concat(kode_nilai_mapel,' - ',nisn) as tampil")
        ->orderBy('nisn')
        ->pluck('tampil', 'kode_nilai_mapel');


        $data['raport'] = new \App\Models\raports();
        $data['alamat_rute'] = 'raportkelas10.store';
        $data['cara'] = 'post';
        $data['judul'] = 'Tambah Daftar Rapor Siswa';
        $data['tombol'] = 'Simpan';
        return view('/folder_raport/form_raportkelas10', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required',
            'kode_tahunajaran' => 'required',
            'npsn' => 'required',
            'kode_nilai_mapel' => '',
            'id_absensi' => 'required',
            'nip_walikelas' => 'required',
            'nip_kepalasekolah' => 'required',
        ]);

        $nilai = new \App\Models\raports();
        $nilai->nisn = $request->nisn;
        $nilai->kode_tahunajaran = $request->kode_tahunajaran;
        $nilai->npsn = $request->npsn;
        $nilai->id_absensi = $request->id_absensi;
        $nilai->nip_walikelas = $request->nip_walikelas;
        $nilai->nip_kepalasekolah = $request->nip_kepalasekolah;
        $nilai->save();

        flash('Data Rapor Berhasil Disimpan');
        return redirect('/raportkelas10');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $nomor_raport)
    {
        $data['rapors'] = raports::where('nomor_raport', $nomor_raport)->get();

        $nilaiRapor = nilai_mapels::whereIn('nisn', function ($query) use ($nomor_raport) {
            $query->select('nisn')
                ->from('raports')
                ->where('nomor_raport', $nomor_raport);
        })->get();

        $data['nilai_rapor'] = $nilaiRapor;
        $data['judul'] = 'Laporan Hasil Belajar Peserta Didik';
        
        return view('/folder_raport/halamanraport', $data);
    }

    /**
     * public function show(string $nomor_raport)
        {
            $data['rapors'] = \App\Models\raports::where('nomor_raport', $nomor_raport)->get();
            $nilaiRapor = \App\Models\nilai_mapels::whereIn('nisn', function ($query) use ($nomor_raport) {
                $query->select('nisn')
                    ->from('raports')
                    ->where('nomor_raport', $nomor_raport);
            })->get();
            
            $data['nilai_rapor'] = $nilaiRapor;
            
            $data['judul'] = 'Laporan Hasil Belajar Peserta Didik';
            return view('/folder_raport/halamanraport', $data);
        }
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $nomor_raport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $nomor_raport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $nomor_raport)
    {
        $data['delete'] = \App\Models\raports::where('nomor_raport', $nomor_raport)->delete();
        flash('Data Telah Dihapus')->error();
        return back();
    }
}
