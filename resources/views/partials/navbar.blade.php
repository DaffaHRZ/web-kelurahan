<nav>
    <div class="container">
        {{-- BENAR: Menggunakan asset helper untuk gambar di folder public --}}
        <img src="{{ asset('img/Lambang_Kota_Depok.png') }}" alt="Logo Kelurahan" class="logo">
        <h1>Kelurahan Depok Jaya</h1>
        <ul>
            {{-- BENAR: Menggunakan URL root atau nama route 'home' jika ada --}}
            <li><a href="{{ url('/') }}">Beranda</a></li>

            {{-- BENAR: Menggunakan route helper untuk URL absolut --}}
            <li><a href="{{ route('profil-kelurahan') }}">Profil Kelurahan</a></li>

            {{-- BENAR: Menggunakan route helper untuk URL absolut --}}
            <li><a href="{{ route('profil-lembaga.index') }}">Kelembagaan</a></li>

            {{-- BENAR: Menggunakan route helper, mengarah ke halaman daftar proposal --}}
            <li><a href="{{ route('proposal.index') }}">Pembuatan Proposal</a></li>
        </ul>
    </div>
</nav>
