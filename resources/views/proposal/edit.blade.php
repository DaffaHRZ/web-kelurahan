@extends('layouts.app2')

@section('title', 'Edit Proposal')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white">
                        <h2 class="card-title h4 mb-0">Edit Proposal: {{ $proposal->judulProposal }}</h2>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Silakan ubah data yang diperlukan pada formulir di bawah ini.</p>

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

                        <form action="{{ route('proposal.update', $proposal->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT') {{-- PENTING untuk update --}}

                            <!-- Informasi Surat & Lokasi -->
                            <div class="form-section mb-4 p-3 border rounded">
                                <h3 class="h5 border-bottom pb-2 mb-3">Informasi Surat & Lokasi</h3>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="judulProposal" class="form-label fw-bold">Judul Proposal</label>
                                        <input type="text" id="judulProposal" name="judulProposal" class="form-control"
                                            value="{{ old('judulProposal', $proposal->judulProposal) }}" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="nomorSurat" class="form-label fw-bold">Nomor Surat</label>
                                        <input type="text" id="nomorSurat" name="nomorSurat" class="form-control"
                                            value="{{ old('nomorSurat', $proposal->nomorSurat) }}" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="lampiran" class="form-label fw-bold">Lampiran</label>
                                        <input type="text" id="lampiran" name="lampiran" class="form-control"
                                            value="{{ old('lampiran', $proposal->lampiran) }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="perihal" class="form-label fw-bold">Perihal</label>
                                        <input type="text" id="perihal" name="perihal" class="form-control"
                                            value="{{ old('perihal', $proposal->perihal) }}" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="rw" class="form-label fw-bold">Nomor RW</label>
                                        <input type="text" id="rw" name="rw" class="form-control"
                                            value="{{ old('rw', $proposal->rw) }}" required>
                                    </div>
                                    <div class="col-md-8 mb-3">
                                        <label for="jalan" class="form-label fw-bold">Nama Jalan</label>
                                        <input type="text" id="jalan" name="jalan" class="form-control"
                                            value="{{ old('jalan', $proposal->jalan) }}" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="kodePos" class="form-label fw-bold">Kode Pos</label>
                                        <input type="text" id="kodePos" name="kodePos" class="form-control"
                                            value="{{ old('kodePos', $proposal->kodePos) }}" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="tanggal" class="form-label fw-bold">Tanggal Surat</label>
                                        <input type="date" id="tanggal" name="tanggal" class="form-control"
                                            value="{{ old('tanggal', $proposal->tanggal) }}" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Detail Proposal -->
                            <div class="form-section mb-4 p-3 border rounded">
                                <h3 class="h5 border-bottom pb-2 mb-3">Detail Kebutuhan Proposal</h3>
                                <div class="mb-3">
                                    <label for="namaBarang" class="form-label fw-bold">Nama Barang/Kegiatan yang
                                        Diajukan</label>
                                    <input type="text" id="namaBarang" name="namaBarang" class="form-control"
                                        value="{{ old('namaBarang', $proposal->namaBarang) }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tempatPenggunaan" class="form-label fw-bold">Lokasi Penggunaan
                                        Barang</label>
                                    <input type="text" id="tempatPenggunaan" name="tempatPenggunaan" class="form-control"
                                        value="{{ old('tempatPenggunaan', $proposal->tempatPenggunaan) }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="jenisKegiatan" class="form-label fw-bold">Jenis Kegiatan yang
                                        Didukung</label>
                                    <input type="text" id="jenisKegiatan" name="jenisKegiatan" class="form-control"
                                        value="{{ old('jenisKegiatan', $proposal->jenisKegiatan) }}" required>
                                </div>
                            </div>

                            <!-- Rencana & Anggaran -->
                            <div class="form-section mb-4 p-3 border rounded">
                                <h3 class="h5 border-bottom pb-2 mb-3">Rencana & Anggaran</h3>
                                <div class="mb-3">
                                    <label for="perencanaan" class="form-label fw-bold">Detail Perencanaan</label>
                                    <textarea id="perencanaan" name="perencanaan" rows="3" class="form-control" required>{{ old('perencanaan', $proposal->perencanaan) }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="pengadaan" class="form-label fw-bold">Detail Pengadaan Bahan</label>
                                    <textarea id="pengadaan" name="pengadaan" rows="3" class="form-control" required>{{ old('pengadaan', $proposal->pengadaan) }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="rehab" class="form-label fw-bold">Detail Pelaksanaan</label>
                                    <textarea id="rehab" name="rehab" rows="3" class="form-control" required>{{ old('rehab', $proposal->rehab) }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="uji" class="form-label fw-bold">Pengujian dan Pemeliharaan</label>
                                    <textarea id="uji" name="uji" rows="3" class="form-control" required>{{ old('uji', $proposal->uji) }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="anggaran" class="form-label fw-bold">Total Anggaran (Rp)</label>
                                    <input type="number" id="anggaran" name="anggaran" class="form-control"
                                        value="{{ old('anggaran', $proposal->anggaran) }}" required>
                                </div>
                            </div>

                            <!-- Penandatangan -->
                            <div class="form-section mb-4 p-3 border rounded">
                                <h3 class="h5 border-bottom pb-2 mb-3">Pihak yang Mengetahui</h3>
                                <div class="mb-3">
                                    <label for="namaKetuaRW" class="form-label fw-bold">Nama Ketua RW</label>
                                    <input type="text" id="namaKetuaRW" name="namaKetuaRW" class="form-control"
                                        value="{{ old('namaKetuaRW', $proposal->namaKetuaRW) }}" required>
                                </div>
                            </div>

                            <!-- Lampiran Gambar -->
                            <div class="form-section mb-4 p-3 border rounded">
                                <h3 class="h5 border-bottom pb-2 mb-3">Lampiran Foto</h3>
                                <div class="mb-3">
                                    <label for="gambar1" class="form-label">Ubah Gambar 1 (Kondisi Saat Ini)</label>
                                    <input type="file" id="gambar1" name="gambar1" class="form-control"
                                        accept="image/*">
                                    @if ($proposal->gambar1_path)
                                        <div class="mt-2">
                                            <small>Gambar saat ini:</small><br>
                                            <img src="{{ asset('storage/' . $proposal->gambar1_path) }}" alt="Gambar 1"
                                                style="width: 150px; height: auto; border-radius: 4px;">
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="gambar2" class="form-label">Ubah Gambar 2 (Referensi/Contoh)</label>
                                    <input type="file" id="gambar2" name="gambar2" class="form-control"
                                        accept="image/*">
                                    @if ($proposal->gambar2_path)
                                        <div class="mt-2">
                                            <small>Gambar saat ini:</small><br>
                                            <img src="{{ asset('storage/' . $proposal->gambar2_path) }}" alt="Gambar 2"
                                                style="width: 150px; height: auto; border-radius: 4px;">
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <a href="{{ route('proposal.index') }}" class="btn btn-secondary me-2">Batal</a>
                                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
