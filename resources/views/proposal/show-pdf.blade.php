<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Proposal - {{ $proposal->judulProposal }}</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            font-size: 12pt;
            line-height: 1.6;
            margin: 2cm;
        }

        .kop-surat {
            text-align: center;
            border-bottom: 2px solid #000;
            margin-bottom: 20px;
            padding-bottom: 10px;
        }

        .kop-surat img {
            width: 70px;
            margin-bottom: 10px;
        }

        .isi-surat {
            text-align: justify;
            line-height: 1.8;
        }

        .section-title {
            font-weight: bold;
            margin-top: 15px;
        }

        .signature-section {
            display: table;
            width: 100%;
            margin-top: 50px;
        }

        .signature-block {
            display: table-cell;
            text-align: center;
            width: 50%;
        }

        .signature-space {
            height: 60px;
        }

        .signature-center {
            text-align: center;
            margin-top: 40px;
        }

        .signature-date-center {
            text-align: right;
            margin-top: 20px;
        }

        .page-break {
            page-break-before: always;
        }

        .lampiran-foto-title {
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .lampiran-foto {
            text-align: center;
            margin-top: 20px;
        }

        .lampiran-foto img {
            width: 300px;
            margin: 10px;
            border: 1px solid #000;
        }
    </style>
</head>

<body>
    {{-- Halaman 1 --}}
    <div class="kop-surat">
        <img src="{{ public_path('img/Lambang_Kota_Depok.png') }}" alt="Logo Kota Depok">
        <h3>RUKUN WARGA {{ $proposal->rw }}</h3>
        <h4>KELURAHAN DEPOK JAYA – KECAMATAN PANCORAN MAS</h4>
        <p>JLN. {{ $proposal->jalan }} KODE POS {{ $proposal->kodePos }}</p>
    </div>

    <table width="100%" style="margin-bottom:20px;">
        <tr>
            <td width="80px">Nomor</td>
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

    <p>Kepada Yth:<br><b>Bapak Walikota Depok</b><br>Jl. Margonda No.64<br>DEPOK</p>

    <div class="isi-surat">
        <p><i>Assalamualaikum Wr. Wb.</i></p>
        <p style="text-indent:40px;">Kami Ketua RW {{ $proposal->rw }} bermaksud mengajukan permohonan pengadaan
            <b>{{ $proposal->namaBarang }}</b>.
        </p>
        <p style="text-indent:40px;">Bersama ini kami lampirkan proposal <b>{{ $proposal->judulProposal }}</b>.</p>
        <p style="text-indent:40px;">Demikian permohonan ini kami sampaikan. Atas perhatian dan bantuannya kami ucapkan
            terima kasih.</p>
        <p><i>Wassalamu’alaikum Wr. Wb.</i></p>
    </div>

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
            <p>Ketua RW {{ $proposal->rw }}</p>
            <div class="signature-space"></div>
            <p><b><u>{{ $proposal->namaKetuaRW }}</u></b></p>
        </div>
    </div>

    <div class="signature-center">
        <p>Mengetahui :<br>LURAH DEPOK JAYA</p>
        <div class="signature-space"></div>
        <p><b><u>HERLINA MAHARANI, S.STP.</u></b></p>
        <p>NIP. 19870904 20060202 2 001</p>
    </div>

    {{-- Halaman 2 --}}
    <div class="page-break"></div>
    <div class="kop-surat">
        <img src="{{ public_path('img/Lambang_Kota_Depok.png') }}" alt="Logo Kota Depok">
        <h3>RUKUN WARGA {{ $proposal->rw }}</h3>
        <h4>KELURAHAN DEPOK JAYA – KECAMATAN PANCORAN MAS</h4>
        <p>JLN. {{ $proposal->jalan }} KODE POS {{ $proposal->kodePos }}</p>
    </div>

    <h4 style="text-align:center; text-decoration:underline;">PROPOSAL {{ strtoupper($proposal->judulProposal) }}</h4>

    <p class="section-title">A. PENDAHULUAN</p>
    <p style="text-indent:40px;">{{ $proposal->namaBarang }} merupakan salah satu fasilitas ...</p>

    <p class="section-title">B. LATAR BELAKANG</p>
    <p style="text-indent:40px;">Ketersediaan {{ $proposal->namaBarang }} yang memadai ...</p>

    <p class="section-title">C. TUJUAN DAN SASARAN</p>
    <ul>
        <li>Menyediakan {{ $proposal->namaBarang }} baru.</li>
        <li>Meningkatkan kenyamanan serta keamanan pengguna.</li>
    </ul>

    <p class="section-title">D. RENCANA KEGIATAN</p>
    <ul>
        <li><b>Perencanaan:</b> {{ $proposal->perencanaan }}</li>
        <li><b>Pengadaan:</b> {{ $proposal->pengadaan }}</li>
        <li><b>Pelaksanaan:</b> {{ $proposal->rehab }}</li>
        <li><b>Pengujian:</b> {{ $proposal->uji }}</li>
    </ul>

    <p class="section-title">E. ANGGARAN BIAYA</p>
    <p style="text-indent:40px;">Rp {{ number_format($proposal->anggaran, 0, ',', '.') }},-</p>

    <p class="section-title">F. PENUTUP</p>
    <p style="text-indent:40px;">Demikian Proposal ini kami sampaikan ...</p>

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
            <p>Ketua RW {{ $proposal->rw }}</p>
            <div class="signature-space"></div>
            <p><b><u>{{ $proposal->namaKetuaRW }}</u></b></p>
        </div>
    </div>

    <div class="signature-center">
        <p>Mengetahui :<br>LURAH DEPOK JAYA</p>
        <div class="signature-space"></div>
        <p><b><u>HERLINA MAHARANI, S.STP.</u></b></p>
        <p>NIP. 19870904 20060202 2 001</p>
    </div>

    {{-- Lampiran --}}
    @if ($proposal->gambar1_path || $proposal->gambar2_path)
        <div class="page-break"></div>
        <h4 class="lampiran-foto-title">LAMPIRAN</h4>
        <div class="lampiran-foto">
            @if ($proposal->gambar1_path)
                <img src="{{ public_path('storage/' . $proposal->gambar1_path) }}" alt="Gambar 1">
            @endif
            @if ($proposal->gambar2_path)
                <img src="{{ public_path('storage/' . $proposal->gambar2_path) }}" alt="Gambar 2">
            @endif
        </div>
    @endif
</body>

</html>
