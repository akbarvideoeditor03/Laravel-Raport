<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class user2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['daftar'] = new \App\Models\User();
        $data['judul'] = 'Daftar Akun User';
        $data['kirim'] = 'registrasi.store';
        $data['simpan'] = 'post';
        $data['tombol'] = 'Daftar';
        
        return view('auth/register1', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'konfirmasi_password' => 'required',
        ]);

        // Menggunakan Hash::make() untuk meng-hash password sebelum menyimpannya
        $hashedPassword = Hash::make($request->password);

        $daftar = new \App\Models\User();
        $daftar->name = $request->name;
        $daftar->email = $request->email;
        $daftar->password = $hashedPassword; // Simpan password yang sudah di-hash
        $daftar->konfirmasi_password = $request->keterangan;
        $daftar->save();

        flash('Selamat Anda Berhasil Mendaftar. Silahkan Login Kembali Untuk Masuk');
        return redirect('/login');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
