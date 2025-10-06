@extends('layouts.app')

@section('title', 'Website Resmi Kelurahan Depok Jaya')

@push('styles')
@endpush

@section('content')
    <main>
        {{-- Hero Section --}}
        <section class="hero">
            <div class="hero-content">
                <h1>Selamat Datang di Website Resmi Kelurahan Depok Jaya</h1>
                <p>Melayani masyarakat dengan cepat, transparan, dan modern di Kecamatan Pancoran Mas, Kota Depok.</p>
            </div>
        </section>

        {{-- About Section --}}
        <section id="tentang" class="about">
            <div class="container">
                <div class="section-title">
                    <h2>Tentang Depok Jaya</h2>
                </div>
                <p>
                    Kelurahan <strong>Depok Jaya</strong> merupakan salah satu kelurahan di Kecamatan Pancoran Mas, Kota
                    Depok, Jawa Barat, dengan luas wilayah sekitar <strong>113 hektar</strong>. Wilayah ini terdiri dari
                    beberapa RT dan RW yang aktif dalam kegiatan masyarakat serta didukung dengan berbagai fasilitas publik
                    untuk melayani kebutuhan warga.
                </p>
                <p>
                    Kantor Kelurahan Depok Jaya saat ini sudah kembali beroperasi di gedung barunya yang terletak di
                    <strong>Jalan Nusantara Raya RT 07 / RW 01</strong>. Gedung ini telah selesai direnovasi dan kini hadir
                    dengan fasilitas yang lebih baik untuk menunjang pelayanan
                    administrasi kepada masyarakat.
                </p>
            </div>
        </section>

        {{-- Services Section --}}
        <section id="layanan" class="services">
            <div class="container">
                <div class="section-title">
                    <h2>Layanan Unggulan</h2>
                </div>
                <div class="grid">
                    <div class="card">
                        <div class="card-icon">📝</div>
                        <h4>Pengajuan Surat</h4>
                        <p>Layanan pengajuan surat keterangan domisili, usaha, dan lainnya secara cepat dan mudah.</p>
                    </div>
                    <div class="card">
                        <div class="card-icon">🗣️</div>
                        <h4>Pengaduan Warga</h4>
                        <p>Sampaikan aspirasi, kritik, atau laporan Anda langsung kepada kami secara online.</p>
                    </div>
                    <div class="card">
                        <div class="card-icon">📰</div>
                        <h4>Informasi Publik</h4>
                        <p>Akses berita terbaru, agenda kegiatan, dan informasi resmi dari kelurahan.</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- News Section --}}
        <section id="berita" class="news">
            <div class="container">
                <div class="section-title">
                    <h2>Berita & Pengumuman</h2>
                </div>
                <div class="grid">
                    <article class="card">
                        <h4>Gotong Royong Mingguan</h4>
                        <p>Warga dihimbau untuk ikut serta dalam kegiatan gotong royong pada hari Minggu untuk menjaga
                            kebersihan dan kenyamanan lingkungan.</p>
                    </article>
                    <article class="card">
                        <h4>Layanan Administrasi Online</h4>
                        <p>Pengajuan surat pengantar, domisili, dan layanan administrasi lainnya kini bisa dilakukan secara
                            online melalui website resmi Kelurahan Depok Jaya.</p>
                    </article>
                    <article class="card">
                        <h4>Pembayaran Pajak Bumi & Bangunan (PBB)</h4>
                        <p>Warga diimbau untuk segera melakukan pembayaran PBB sebelum jatuh tempo. Informasi lebih lanjut
                            dapat diperoleh di kantor kelurahan atau website resmi.</p>
                    </article>
                </div>
            </div>
        </section>

        {{-- Maps Section --}}
        <section id="lokasi" class="maps">
            <div class="container">
                <div class="section-title">
                    <h2>Lokasi Kelurahan Depok Jaya</h2>
                </div>
                <div class="map-container">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.132899752834!2d106.8118088759458!3d-6.389508862507663!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e9571dc6b03b%3A0x74fa30a545a82ab3!2sKantor%20Kelurahan%20Depok%20Jaya!5e0!3m2!1sid!2sid!4v1695967657224!5m2!1sid!2sid"
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </section>
    </main>
@endsection
