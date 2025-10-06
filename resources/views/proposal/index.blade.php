@extends('layouts.app2')

@section('title', 'Manajemen Proposal Kelurahan')

@section('content')
    <div class="container py-5">

        {{-- Header Halaman --}}
        <div class="text-center mb-5">
            <h1 class="h2 fw-bold text-dark">Manajemen Proposal Kelurahan</h1>
            <p class="text-muted mt-2">
                Halaman ini digunakan untuk membuat dan mengelola proposal kegiatan di tingkat RW/kelurahan.
                Silakan klik tombol di bawah untuk memulai pembuatan template proposal baru.
            </p>
        </div>

        {{-- Card Utama --}}
        <div class="card shadow-sm border-0 mx-auto" style="max-width: 700px;">
            <div class="card-body text-center py-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor"
                    class="bi bi-file-earmark-text text-primary mb-4" viewBox="0 0 16 16">
                    <path
                        d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zM10.5 4a.5.5 0 0 1-.5-.5V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4h-2.5z" />
                    <path d="M5 7h6v1H5V7zm0 2h6v1H5V9zm0 2h6v1H5v-1z" />
                </svg>

                <h4 class="fw-bold text-dark mb-3">Buat Proposal Baru</h4>
                <p class="text-muted mb-4">
                    Klik tombol di bawah untuk membuat proposal baru.
                    Anda akan diarahkan ke halaman form pengisian detail proposal kegiatan.
                </p>

                <a href="{{ route('proposal.create') }}" class="btn btn-lg btn-primary shadow-sm">
                    <i class="fas fa-plus me-2"></i> Mulai Buat Proposal
                </a>
            </div>
        </div>

    </div>
@endsection
