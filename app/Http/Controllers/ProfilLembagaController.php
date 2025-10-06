<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilLembagaController extends Controller
{
    public function index()
    {
        // Data lembaga bisa nanti diambil dari database
        $lembagas = [
            [
                'nama' => 'PKK',
                'deskripsi' => 'Pemberdayaan Kesejahteraan Keluarga, aktif dalam kegiatan sosial, kesehatan, dan pendidikan keluarga.'
            ],
            [
                'nama' => 'Karang Taruna',
                'deskripsi' => 'Organisasi kepemudaan desa yang bergerak dalam bidang sosial, olahraga, dan kreativitas pemuda.'
            ],
            [
                'nama' => 'LPM',
                'deskripsi' => 'Lembaga Pemberdayaan Masyarakat yang berperan dalam perencanaan dan pelaksanaan pembangunan desa.'
            ]
        ];

        return view('profil-lembaga.index', compact('lembagas'));
    }
}
