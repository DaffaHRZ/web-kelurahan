@extends('layouts.app2')

@section('title', 'Buat Proposal Baru')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h2 class="card-title h4 mb-0">Formulir Pembuatan Proposal RW</h2>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Silakan isi semua kolom di bawah ini untuk membuat dokumen proposal secara
                            otomatis.
                            Kolom bertanda <span class="text-danger">*</span> wajib diisi.</p>

                        {{-- Menampilkan error validasi jika ada --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong class="h5">Oops! Ada beberapa masalah dengan input Anda.</strong>
                                <ul class="mt-2 mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('proposal.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-section mb-4 p-3 border rounded">
                                <h3 class="h5 border-bottom pb-2 mb-3">Informasi Surat & Lokasi</h3>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="judulProposal" class="form-label fw-bold">Judul Proposal <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="judulProposal" name="judulProposal" class="form-control"
                                            placeholder="Contoh: Pengadaan Sarana dan Prasarana"
                                            value="{{ old('judulProposal') }}" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="nomorSurat" class="form-label fw-bold">Nomor Surat <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="nomorSurat" name="nomorSurat" class="form-control"
                                            placeholder="Contoh: 001/RW/IX/2025" value="{{ old('nomorSurat') }}" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="lampiran" class="form-label fw-bold">Lampiran</label>
                                        <input type="text" id="lampiran" name="lampiran" class="form-control"
                                            placeholder="Contoh: 1 Berkas" value="{{ old('lampiran') }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="perihal" class="form-label fw-bold">Perihal <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="perihal" name="perihal" class="form-control"
                                            placeholder="Contoh: Permohonan Bantuan Dana" value="{{ old('perihal') }}"
                                            required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="rw" class="form-label fw-bold">Nomor RW <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="rw" name="rw" class="form-control"
                                            placeholder="Contoh: 01" value="{{ old('rw') }}" required>
                                    </div>
                                    <div class="col-md-8 mb-3">
                                        <label for="jalan" class="form-label fw-bold">Nama Jalan <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="jalan" name="jalan" class="form-control"
                                            placeholder="Contoh: Jl. Merdeka" value="{{ old('jalan') }}" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="kodePos" class="form-label fw-bold">Kode Pos <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="kodePos" name="kodePos" class="form-control"
                                            placeholder="Contoh: 16432" value="{{ old('kodePos') }}" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="tanggal" class="form-label fw-bold">Tanggal Surat <span
                                                class="text-danger">*</span></label>
                                        <input type="date" id="tanggal" name="tanggal" class="form-control"
                                            value="{{ old('tanggal') ?? date('Y-m-d') }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-section mb-4 p-3 border rounded">
                                <h3 class="h5 border-bottom pb-2 mb-3">Detail Kebutuhan Proposal</h3>
                                <div class="mb-3">
                                    <label for="namaBarang" class="form-label fw-bold">Nama Barang/Kegiatan <span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="namaBarang" name="namaBarang" class="form-control"
                                        placeholder="Contoh: Kursi dan Meja Serbaguna" value="{{ old('namaBarang') }}"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="tempatPenggunaan" class="form-label fw-bold">Lokasi Penggunaan <span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="tempatPenggunaan" name="tempatPenggunaan"
                                        class="form-control" placeholder="Contoh: Balai Warga RW.01"
                                        value="{{ old('tempatPenggunaan') }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="jenisKegiatan" class="form-label fw-bold">Jenis Kegiatan <span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="jenisKegiatan" name="jenisKegiatan" class="form-control"
                                        placeholder="Contoh: Rapat warga, posyandu, acara sosial"
                                        value="{{ old('jenisKegiatan') }}" required>
                                </div>
                            </div>

                            <div class="form-section mb-4 p-3 border rounded">
                                <h3 class="h5 border-bottom pb-2 mb-3">Rencana & Anggaran</h3>
                                <div class="mb-3">
                                    <label for="perencanaan" class="form-label fw-bold">Detail Perencanaan <span
                                            class="text-danger">*</span></label>
                                    <textarea id="perencanaan" name="perencanaan" rows="3" class="form-control"
                                        placeholder="Contoh: Survei kebutuhan, penentuan spesifikasi barang, pemilihan vendor" required>{{ old('perencanaan') }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="pengadaan" class="form-label fw-bold">Detail Pengadaan <span
                                            class="text-danger">*</span></label>
                                    <textarea id="pengadaan" name="pengadaan" rows="3" class="form-control"
                                        placeholder="Contoh: Pembelian unit dari vendor terpilih" required>{{ old('pengadaan') }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="rehab" class="form-label fw-bold">Detail Pelaksanaan <span
                                            class="text-danger">*</span></label>
                                    <textarea id="rehab" name="rehab" rows="3" class="form-control"
                                        placeholder="Contoh: Pengiriman dan penataan barang di lokasi" required>{{ old('rehab') }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="uji" class="form-label fw-bold">Pengujian & Pemeliharaan <span
                                            class="text-danger">*</span></label>
                                    <textarea id="uji" name="uji" rows="3" class="form-control"
                                        placeholder="Contoh: Pengecekan kualitas dan jadwal pemeliharaan" required>{{ old('uji') }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="anggaran" class="form-label fw-bold">Total Anggaran (Rp) <span
                                            class="text-danger">*</span></label>
                                    <input type="number" id="anggaran" name="anggaran" class="form-control"
                                        placeholder="Contoh: 15000000" value="{{ old('anggaran') }}" required>
                                </div>
                            </div>

                            <div class="form-section mb-4 p-3 border rounded">
                                <h3 class="h5 border-bottom pb-2 mb-3">Pihak yang Mengetahui</h3>
                                <div class="mb-3">
                                    <label for="namaKetuaRW" class="form-label fw-bold">Nama Ketua RW <span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="namaKetuaRW" name="namaKetuaRW" class="form-control"
                                        placeholder="Contoh: Bambang Wijoyo" value="{{ old('namaKetuaRW') }}" required>
                                </div>
                            </div>

                            <div class="form-section mb-4 p-3 border rounded">
                                <h3 class="h5 border-bottom pb-2 mb-3">Lampiran Foto</h3>
                                <div class="mb-3">
                                    <label for="gambar1" class="form-label">Gambar 1 (Kondisi Saat Ini)</label>
                                    <input type="file" id="gambar1" name="gambar1" class="form-control"
                                        accept="image/*">
                                </div>
                                <div class="mb-3">
                                    <label for="gambar2" class="form-label">Gambar 2 (Referensi/Contoh)</label>
                                    <input type="file" id="gambar2" name="gambar2" class="form-control"
                                        accept="image/*">
                                </div>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">Simpan Proposal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
