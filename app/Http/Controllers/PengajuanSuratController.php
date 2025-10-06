<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengajuanSurat;

class PengajuanSuratController extends Controller
{
    // Tampilkan form
    public function index()
    {
        return view('pengajuan.pengajuan');
    }

    // Proses submit form
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:20',
            'alamat' => 'required|string',
            'jenis_surat' => 'required|string|max:50',
            'keperluan' => 'required|string',
        ]);

        // Simpan ke database
        $pengajuan = PengajuanSurat::create([
            'nama' => $validated['nama'],
            'nik' => $validated['nik'],
            'alamat' => $validated['alamat'],
            'jenis_surat' => $validated['jenis_surat'],
            'keperluan' => $validated['keperluan'],
            'status' => 'pending',
        ]);

        return redirect()->route('pengajuan-surat.index')->with('success', 'Pengajuan surat berhasil dikirim. ID: ' . $pengajuan->id);
    }
}
