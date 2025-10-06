@extends('layouts.app')

@section('title', 'Website Resmi Kelurahan Depok Jaya')

@section('content')

    <main id="main">

        {{-- Lembaga Kemasyarakatan Kelurahan --}}
        <section id="lembaga-masyarakat" class="lembaga-section py-5 bg-light">
            <div class="container">
                <div class="section-title text-center mb-5">
                    <h2>Lembaga Kemasyarakatan Kelurahan</h2>
                    <p class="lead">Motor penggerak partisipasi warga dalam pembangunan dan kegiatan sosial di Depok Jaya.
                    </p>
                </div>

                <div class="row g-4 justify-content-center">

                    {{-- Card PKK --}}
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch">
                        <div class="card card-lembaga text-center w-100 shadow-sm">
                            <div class="card-body p-4">
                                <div class="icon-box-lembaga mx-auto mb-3">
                                    <i class="fas fa-hands-helping"></i>
                                </div>
                                <h3 class="card-title h5">PKK</h3>
                                <p class="card-text">
                                    Fokus pada pemberdayaan dan kesejahteraan keluarga melalui program kesehatan,
                                    pendidikan, dan ekonomi.
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Card Karang Taruna --}}
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch">
                        <div class="card card-lembaga text-center w-100 shadow-sm">
                            <div class="card-body p-4">
                                <div class="icon-box-lembaga mx-auto mb-3">
                                    <i class="fas fa-users"></i>
                                </div>
                                <h3 class="card-title h5">Karang Taruna</h3>
                                <p class="card-text">
                                    Wadah pengembangan generasi muda yang aktif dalam kegiatan sosial, olahraga, dan
                                    kreativitas.
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Card LPM --}}
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch">
                        <div class="card card-lembaga text-center w-100 shadow-sm">
                            <div class="card-body p-4">
                                <div class="icon-box-lembaga mx-auto mb-3">
                                    <i class="fas fa-cogs"></i>
                                </div>
                                <h3 class="card-title h5">LPM</h3>
                                <p class="card-text">
                                    Mitra kelurahan dalam merencanakan dan melaksanakan pembangunan untuk kemajuan
                                    lingkungan.
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Card Forum Anak --}}
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch">
                        <div class="card card-lembaga text-center w-100 shadow-sm">
                            <div class="card-body p-4">
                                <div class="icon-box-lembaga mx-auto mb-3">
                                    <i class="fas fa-child"></i>
                                </div>
                                <h3 class="card-title h5">Forum Anak</h3>
                                <p class="card-text">
                                    Media partisipasi anak dalam menyuarakan aspirasi dan mengembangkan potensi diri sejak
                                    dini.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>

@endsection
