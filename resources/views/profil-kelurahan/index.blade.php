@extends('layouts.app')

@section('title', 'Profil Kelurahan Depok Jaya')

@section('content')
    <main id="main">

        {{-- Profil Kelurahan --}}
        <section id="profil" class="profil-section py-5">
            <div class="container">
                <div class="section-title text-center mb-5">
                    <h2>Profil Kelurahan Depok Jaya</h2>
                    <p class="lead">Mengenal lebih dekat visi, misi, dan nilai yang kami anut untuk melayani masyarakat.
                    </p>
                </div>

                <div class="row justify-content-center text-center mb-4">
                    <div class="col-lg-10">
                        <p>
                            Kelurahan <strong>Depok Jaya</strong> merupakan salah satu kelurahan di Kecamatan Pancoran Mas,
                            Kota Depok,
                            yang memiliki luas wilayah sekitar <strong>113 hektar</strong>. Dengan jumlah penduduk yang
                            beragam,
                            Depok Jaya menjadi wilayah yang aktif dalam berbagai kegiatan pembangunan dan sosial
                            kemasyarakatan.
                        </p>
                    </div>
                </div>

                <div class="row g-4 justify-content-center">
                    {{-- Card Visi --}}
                    <div class="col-lg-5">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body p-4">
                                <div class="icon-box mb-3">
                                    <i class="fas fa-eye fa-2x text-primary"></i> {{-- Contoh penggunaan icon --}}
                                </div>
                                <h3 class="card-title">Visi</h3>
                                <p class="card-text">
                                    Terwujudnya Kelurahan Depok Jaya sebagai wilayah yang <strong>maju, sehat, dan
                                        harmonis</strong>
                                    dengan pelayanan publik yang prima.
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Card Misi --}}
                    <div class="col-lg-5">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body p-4">
                                <div class="icon-box mb-3">
                                    <i class="fas fa-bullseye fa-2x text-primary"></i> {{-- Contoh penggunaan icon --}}
                                </div>
                                <h3 class="card-title">Misi</h3>
                                <ul class="list-unstyled">
                                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Meningkatkan
                                        kualitas pelayanan administrasi masyarakat.</li>
                                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Mendorong
                                        partisipasi aktif warga dalam pembangunan.</li>
                                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Mewujudkan
                                        lingkungan yang bersih, sehat, dan nyaman.</li>
                                    <li><i class="fas fa-check-circle text-success me-2"></i>Memberdayakan potensi ekonomi
                                        masyarakat.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Struktur Organisasi --}}
        <section id="struktur" class="struktur-section py-5 bg-light">
            <div class="container">
                <div class="section-title text-center mb-5">
                    <h2>Struktur Organisasi</h2>
                    <p class="lead">Susunan organisasi yang menopang pelayanan di Kelurahan Depok Jaya.</p>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <figure class="figure text-center">
                            <img src="{{ asset('img/struktur2.png') }}" class="figure-img img-fluid rounded shadow-lg"
                                alt="Struktur Organisasi Kelurahan Depok Jaya">
                            <figcaption class="figure-caption mt-3">
                                <strong>Dasar Hukum:</strong> Lampiran II Peraturan Walikota Depok Nomor III Tahun 2018
                                tentang Kedudukan, Susunan Organisasi, Tugas Fungsi, serta Tata Kerja Kelurahan.
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
