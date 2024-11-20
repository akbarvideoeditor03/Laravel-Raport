<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\alamat_siswa;



class siswaController extends Controller
{
    
    public function index()
    {
        $data['siswa']= \App\Models\siswas::all();
        $data['tittle']='Data-Data Siswa Kelas 10';
        return view('/folder_siswa/datasiswa', $data);
    }


    public function create()
    {
        $data['siswabaru'] = new \App\Models\siswas();
        $data['alamat_rute'] = 'datasiswa.store';
        $data['cara'] = 'post';
        $data['judul'] = 'Tambah Data Siswa';
        $data['tombol'] = 'Simpan';
        $data['klmn'] = [
            '' => 'Pilih',
            'Laki-Laki' => 'Laki-Laki',
            'Perempuan' => 'Perempuan'
        ];
        return view('/folder_siswa/form_siswa', $data);

    }

    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required',
            'nama_siswa' => 'required',
            'jenis_kelamin' => 'required',
            'nomor_kontak' => 'required',
            'nama_wali_siswa' => 'required',
            'gambar_ttd_tanganwalisiswa' => 'required|image|mimes:png|max:5000',
        ], [
            'gambar_ttd_tanganwalisiswa.required' => 'Gambar Tidak Boleh Kosong.',
            'gambar_ttd_tanganwalisiswa.image' => 'Gambar Harus Sesuai format.',
            'gambar_ttd_tanganwalisiswa.max' => 'Ukuran file melebihi batas maksimal.',
        ]);

        
        if ($request->hasFile('gambar_ttd_tanganwalisiswa')) {
            $image = $request->file('gambar_ttd_tanganwalisiswa');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/gambar_ttd_tanganwalisiswa', $imageName);
        }

        $siswabaru = new \App\Models\siswas();
        $siswabaru->nisn = $request->nisn;
        $siswabaru->nama_siswa = $request->nama_siswa;
        $siswabaru->jenis_kelamin = $request->jenis_kelamin;
        $siswabaru->nomor_kontak = $request->nomor_kontak;
        $siswabaru->nama_wali_siswa = $request->nama_wali_siswa;
        $siswabaru->gambar_ttd_tanganwalisiswa = $imageName;
        $siswabaru->save();

        flash('Satu langkah lagi! Ayo lengkapi alamatnya sekarang 😊')->success();
        return redirect()->route('datasiswa.alamat', $siswabaru->nisn)->with('success', 'Satu langkah lagi! Ayo lengkapi alamat sekarang');
    }


    public function alamat(string $nisn)
    {
        $data['alamat_siswa'] = \App\Models\siswas::where('nisn', $nisn)->firstOrFail();
        $data['alamat_rute'] = ['datasiswa.storealamat', $nisn];
        $data['cara'] = 'post';
        $data['judul'] = 'Alamat Siswa';
        $data['tombol'] = 'Simpan';
        return view('/folder_siswa/form_alamatsiswa', $data);
    }

    public function storealamat(Request $request, string $nisn)
    {
        $siswa = \App\Models\siswas::where('nisn', $nisn)->firstOrFail();

        $request->validate([
            'kelurahan_desa' => 'required',
            'kecamatan' => 'required',
            'kabupaten_kota' => 'required',
            'provinsi' => 'required',
        ]);

        $alamat = new \App\Models\alamat_siswa();
        $alamat->nisn = $nisn;
        $alamat->kelurahan_desa = $request->kelurahan_desa;
        $alamat->kecamatan = $request->kecamatan;
        $alamat->kabupaten_kota = $request->kabupaten_kota;
        $alamat->provinsi = $request->provinsi;
        $alamat->save();
        flash('Selamat Data Telah Disimpan Seluruhnya 😊')->success();
        return redirect('/datasiswa');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $nisn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $nisn)
    {
        $data['siswabaru'] = \App\Models\siswas::where('nisn', $nisn)->firstOrFail();
        $data['alamat_rute'] = ['datasiswa.update', $nisn];
        $data['cara'] = 'put';
        $data['judul'] = 'Edit Data Siswa';
        $data['tombol'] = 'Perbarui';
        $data['klmn'] = [
            '' => 'Pilih',
            'Laki-Laki' => 'Laki-Laki',
            'Perempuan' => 'Perempuan'
        ];
        return view('/folder_siswa/form_siswa', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $nisn)
    {
        $request->validate([
            'nisn' => 'required',
            'nama_siswa' => 'required',
            'jenis_kelamin' => 'required',
            'nomor_kontak' => 'required',
            'nama_wali_siswa' => 'required',
            'gambar_ttd_tanganwalisiswa' => '',
        ]);

        if ($request->hasFile('gambar_ttd_tanganwalisiswa')) {
            $image = $request->file('gambar_ttd_tanganwalisiswa');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/gambar_ttd_tanganwalisiswa', $imageName);
        }

        $siswabaru = \App\Models\siswas::where('nisn', $nisn)->firstOrFail();
        $siswabaru->nisn = $request->nisn;
        $siswabaru->nama_siswa = $request->nama_siswa;
        $siswabaru->jenis_kelamin = $request->jenis_kelamin;
        $siswabaru->nomor_kontak = $request->nomor_kontak;
        $siswabaru->nama_wali_siswa = $request->nama_wali_siswa;
        $siswabaru->save();

        flash('Data Siswa Berhasil Diperbarui');
        return redirect('/datasiswa');
    }
    
    public function delete(string $nisn)
    {
        $siswabaru = \App\Models\siswas::where('nisn', $nisn)->firstOrFail();
        $siswabaru->delete();
        flash('Data Telah Dihapus')->success();
        return redirect('/datasiswa');
    }
}
