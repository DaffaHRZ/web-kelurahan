@extends('layouts.app')

@section('title', 'Pengajuan Surat - Kelurahan Depok Jaya')

@section('content')
    <style>
        /* Container & Card */
        .form-wrapper {
            max-width: 650px;
            margin: 0 auto;
        }

        .form-card {
            background: #fff;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .form-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.12);
        }

        /* Title */
        .section-title h2 {
            font-weight: 700;
            font-size: 1.8rem;
            color: #0d2149;
        }

        .section-title p {
            color: #555;
            margin-bottom: 20px;
        }

        /* Input & Textarea */
        .form-control,
        .form-select {
            border-radius: 10px;
            border: 1px solid #ddd;
            padding: 12px;
            font-size: 0.95rem;
            transition: all 0.2s ease-in-out;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #007bff;
            box-shadow: 0 0 6px rgba(0, 123, 255, 0.25);
        }

        /* Label */
        .form-label {
            font-weight: 600;
            margin-bottom: 6px;
            color: #333;
        }

        /* Button */
        .btn-primary {
            background: #007bff;
            border: none;
            border-radius: 10px;
            padding: 10px 24px;
            font-weight: 600;
            transition: background 0.3s ease;
        }

        .btn-primary:hover {
            background: #0056b3;
        }

        /* Alert */
        .alert {
            border-radius: 12px;
            padding: 15px;
            font-size: 0.95rem;
            margin-bottom: 20px;
        }
    </style>

    <main class="py-5">
        <div class="container form-wrapper">
            <div class="section-title text-center mb-4">
                <h2>Form Pengajuan Surat</h2>
                <p>Silakan lengkapi data di bawah ini untuk mengajukan surat keterangan.</p>
            </div>

            {{-- Alert Sukses/Error --}}
            @if (session('success'))
                <div class="alert alert-success">
                    ✅ {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-card">
                <form action="{{ route('pengajuan-surat.store') }}" method="POST">
                    @csrf

                    <!-- Nama Lengkap -->
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama"
                            placeholder="Masukkan nama lengkap" required>
                    </div>

                    <!-- NIK -->
                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK"
                            required>
                    </div>

                    <!-- Alamat -->
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat Lengkap</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat sesuai KTP"
                            required></textarea>
                    </div>

                    <!-- Jenis Surat -->
                    <div class="mb-3">
                        <label for="jenis_surat" class="form-label">Jenis Surat</label>
                        <select class="form-select" id="jenis_surat" name="jenis_surat" required>
                            <option value="">-- Pilih Jenis Surat --</option>
                            <option value="domisili">Surat Keterangan Domisili</option>
                            <option value="usaha">Surat Keterangan Usaha</option>
                            <option value="tidak_mampu">Surat Keterangan Tidak Mampu</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                    </div>

                    <!-- Keperluan -->
                    <div class="mb-3">
                        <label for="keperluan" class="form-label">Keperluan</label>
                        <textarea class="form-control" id="keperluan" name="keperluan" rows="2" placeholder="Jelaskan keperluan surat ini"
                            required></textarea>
                    </div>

                    <!-- Tombol Submit -->
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Ajukan Surat</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
