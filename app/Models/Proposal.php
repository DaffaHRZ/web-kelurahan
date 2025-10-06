<?php

// app/Models/Proposal.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    protected $fillable = [
        'judulProposal',
        'nomorSurat',
        'lampiran',
        'perihal',
        'rw',
        'jalan',
        'kodePos',
        'tanggal',
        'namaBarang',
        'tempatPenggunaan',
        'jenisKegiatan',
        'perencanaan',
        'pengadaan',
        'rehab',
        'uji',
        'anggaran',
        'namaKetuaRW',
        'gambar1_path',
        'gambar2_path',
    ];
}
