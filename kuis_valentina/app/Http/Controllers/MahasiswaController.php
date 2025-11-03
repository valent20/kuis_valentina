<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['dataMahasiswa'] = Pelanggan::all();
        return view('admin.mahasiswa.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all()) ;
        $data['nama_mahasiswa'] = $request->nama_mahasiswa;
        $data['NIM'] = $request->NIM;
        $data['email'] = $request->email;
        $data['jurusan'] = $request->jurusan;
        $data['alamat'] = $request->alamat;

        Pelanggan::create($data);

        return redirect()->route('mahasiswa.index')->with('success', 'Penambahan Data Berhasil!');
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
        // === FUNGSI EDIT YANG BENAR ===
        // Nama variabelnya 'dataMahasiswa', disamakan dengan view kamu
        $data['dataMahasiswa'] = Mahasiswa::findOrFail($id);

        return view('admin.mahasiswa.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // === FUNGSI UPDATE YANG BENAR ===

        // 1. Cari data Mahasiswa yang mau di-update
        $mahasiswa = Mahasiswa::findOrFail($id);

        // 2. Siapkan data baru dari form
        $data['nama_mahasiswa'] = $request->nama_mahasiswa;
        $data['NIM'] = $request->NIM;
        $data['email'] = $request->email;
        $data['jurusan'] = $request->jurusan;
        $data['alamat'] = $request->alamat;

        // 3. Update data di database
        $mahasiswa->update($data);

        // 4. Redirect kembali ke halaman index
        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mahasiswa = \App\Models\Mahasiswa::findOrFail($id);

        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data Mahasiswa berhasil dihapus.');
    }
}
