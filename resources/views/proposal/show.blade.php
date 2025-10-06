@extends('layouts.app2')

@section('title', 'Detail Proposal: ' . $proposal->judulProposal)

{{-- Import CSS khusus proposal --}}
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/proposal.css') }}">
@endpush

@section('content')
    <div class="container-fluid mt-4">

        {{-- ===================== --}}
        {{-- Tombol Aksi --}}
        {{-- ===================== --}}
        <div class="action-buttons mb-4 text-center">
            <a href="{{ route('proposal.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali ke Daftar
            </a>
            <a href="{{ route('proposal.edit', $proposal->id) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Edit
            </a>
            <button onclick="window.print()" class="btn btn-info">
                <i class="fas fa-print"></i> Cetak Proposal
            </button>

        </div>

        <div id="proposalDocument" class="document-wrapper">
            {{-- ===================== --}}
            {{-- Kop Surat --}}
            {{-- ===================== --}}
            <div class="kop-surat">
                <img src="{{ asset('img/Lambang_Kota_Depok.png') }}" alt="Logo Kota Depok">
                <div class="kop-surat-text">
                    <h3 class="title">RUKUN WARGA {{ $proposal->rw }}</h3>
                    <h4 class="subtitle">KELURAHAN DEPOK JAYA – KECAMATAN PANCORAN MAS</h4>
                    <p class="address">JLN. {{ $proposal->jalan }} KODE POS {{ $proposal->kodePos }}</p>
                </div>
            </div>

            {{-- Nomor Surat & Tujuan --}}
            <div class="d-flex justify-content-between mt-4">
                <div>
                    <table>
                        <tr>
                            <td style="width: 80px;">Nomor</td>
                            <td>: {{ $proposal->nomorSurat }}</td>
                        </tr>
                        <tr>
                            <td>Lampiran</td>
                            <td>: {{ $proposal->lampiran }}</td>
                        </tr>
                        <tr>
                            <td>Perihal</td>
                            <td>: <b>{{ $proposal->perihal }}</b></td>
                        </tr>
                    </table>
                </div>
                <div>
                    <p class="mb-0">Kepada Yth :</p>
                    <p class="mb-0"><b>Bapak Walikota Depok</b></p>
                    <p class="mb-0">Jl. Margonda No. 64</p>
                    <p class="mb-0">DEPOK</p>
                </div>
            </div>

            {{-- ===================== --}}
            {{-- Isi Surat --}}
            {{-- ===================== --}}
            <div class="mt-4 isi-surat">
                <p style="margin-bottom: 5px;"><i>Assalamualaikum Wr. Wb.</i></p>
                <p style="text-indent: 40px; margin-bottom: 5px;">
                    Kami Ketua RW. {{ $proposal->rw }} bermaksud mengajukan permohonan pengadaan
                    <b>{{ $proposal->namaBarang }}</b> guna menunjang kenyamanan dan keselamatan kegiatan masyarakat.
                </p>
                <p style="text-indent: 40px; margin-bottom: 5px;">
                    Bersama ini kami lampirkan proposal <b>{{ $proposal->judulProposal }}</b> yang memuat spesifikasi
                    teknis serta rencana anggaran pengadaan <b>{{ $proposal->namaBarang }}</b>.
                </p>
                <p style="text-indent: 40px; margin-bottom: 5px;">
                    Demikian permohonan ini kami sampaikan. Atas perhatian dan bantuannya kami ucapkan terima kasih.
                </p>
                <p style="margin-top: 10px; margin-bottom: 0;"><i>Wassalamu’alaikum Wr. Wb.</i></p>
            </div>

            {{-- ===================== --}}
            {{-- Tanda Tangan --}}
            {{-- ===================== --}}
            <div>
                <div class="signature-date-center">
                    <p>Depok, {{ \Carbon\Carbon::parse($proposal->tanggal)->isoFormat('D MMMM YYYY') }}</p>
                </div>
                <div class="signature-section">
                    <div class="signature-block">
                        <p>Ketua LPM DEPOK JAYA</p>
                        <div class="signature-space"></div>
                        <p><b><u>H.YUDI TANTO S.Si.MT.</u></b></p>
                    </div>
                    <div class="signature-block">
                        <p>Ketua RW. {{ $proposal->rw }}</p>
                        <div class="signature-space"></div>
                        <p><b><u>{{ $proposal->namaKetuaRW }}</u></b></p>
                    </div>
                </div>
            </div>

            <div class="signature-center">
                <p>Mengetahui :</p>
                <p>LURAH DEPOK JAYA</p>
                <div class="signature-space"></div>
                <p><b><u>HERLINA MAHARANI, S.STP.</u></b></p>
                <p style="margin:0; padding:0;">NIP. 19870904 20060202 2 001</p>
            </div>

            {{-- Halaman 2 --}}
            <div class="page-break"></div>
            <div class="kop-surat">
                <img src="{{ asset('img/Lambang_Kota_Depok.png') }}" alt="Logo Kota Depok">
                <div class="kop-surat-text">
                    <h3 class="title">RUKUN WARGA {{ $proposal->rw }}</h3>
                    <h4 class="subtitle">KELURAHAN DEPOK JAYA – KECAMATAN PANCORAN MAS</h4>
                    <p class="address">JLN. {{ $proposal->jalan }} KODE POS {{ $proposal->kodePos }}</p>
                </div>
            </div>

            <div class="text-center mt-4">
                <h5 class="judul-proposal">PROPOSAL {{ strtoupper($proposal->judulProposal) }}</h5>
                <p>
                    JLN. {{ $proposal->jalan }} RW. {{ $proposal->rw }} <br>
                    UNTUK MENINGKATKAN KUALITAS PELAYANAN MASYARAKAT
                </p>
            </div>

            {{-- Isi Proposal --}}
            <div class="mt-4 isi-surat">
                <p class="section-title">A. PENDAHULUAN</p>
                <p style="text-indent: 40px;">
                    {{ $proposal->namaBarang }} merupakan salah satu fasilitas yang sangat dibutuhkan...
                </p>

                <p class="section-title">B. LATAR BELAKANG</p>
                <p style="text-indent: 40px;">
                    Ketersediaan {{ $proposal->namaBarang }} yang memadai dan dalam kondisi baik...
                </p>

                <p class="section-title">C. TUJUAN DAN SASARAN</p>
                <ul style="padding-left: 60px;">
                    <li>Menyediakan {{ $proposal->namaBarang }} baru.</li>
                    <li>Meningkatkan kenyamanan serta keamanan pengguna.</li>
                </ul>

                <p class="section-title">D. RENCANA KEGIATAN</p>
                <ul style="padding-left: 60px;">
                    <li><b>Perencanaan:</b> {{ $proposal->perencanaan }}</li>
                    <li><b>Pengadaan:</b> {{ $proposal->pengadaan }}</li>
                    <li><b>Pelaksanaan:</b> {{ $proposal->rehab }}</li>
                    <li><b>Pengujian:</b> {{ $proposal->uji }}</li>
                </ul>

                <p class="section-title">E. ANGGARAN BIAYA</p>
                <p style="text-indent: 40px;">
                    Anggaran sebesar <b>Rp. {{ number_format($proposal->anggaran, 0, ',', '.') }},-</b>.
                </p>

                <p class="section-title">F. PENUTUP</p>
                <p style="text-indent: 40px;">
                    Demikian Proposal ini kami sampaikan...
                </p>
            </div>

            {{-- Tanda Tangan Halaman 2 --}}
            <div>
                <div class="signature-date-center">
                    <p>Depok, {{ \Carbon\Carbon::parse($proposal->tanggal)->isoFormat('D MMMM YYYY') }}</p>
                </div>
                <div class="signature-section">
                    <div class="signature-block">
                        <p>Ketua LPM DEPOK JAYA</p>
                        <div class="signature-space"></div>
                        <p><b><u>H.YUDI TANTO S.Si.MT.</u></b></p>
                    </div>
                    <div class="signature-block">
                        <p>Ketua RW. {{ $proposal->rw }}</p>
                        <div class="signature-space"></div>
                        <p><b><u>{{ $proposal->namaKetuaRW }}</u></b></p>
                    </div>
                </div>
            </div>

            <div class="signature-center">
                <p>Mengetahui :</p>
                <p>LURAH DEPOK JAYA</p>
                <div class="signature-space"></div>
                <p><b><u>HERLINA MAHARANI, S.STP.</u></b></p>
                <p style="margin:0; padding:0;">NIP. 19870904 20060202 2 001</p>
            </div>

            {{-- Lampiran Foto --}}
            @if ($proposal->gambar1_path || $proposal->gambar2_path)
                <div class="page-break"></div>
                <h4 class="lampiran-foto-title">LAMPIRAN </h4>
                <div class="lampiran-foto">
                    @if ($proposal->gambar1_path)
                        <figure>
                            <img src="{{ asset('storage/' . $proposal->gambar1_path) }}" alt="Gambar 1">
                        </figure>
                    @endif
                    @if ($proposal->gambar2_path)
                        <figure>
                            <img src="{{ asset('storage/' . $proposal->gambar2_path) }}" alt="Gambar 2">
                        </figure>
                    @endif
                </div>
            @endif

        </div>
    </div>
@endsection
