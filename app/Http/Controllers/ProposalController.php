<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf; // tambahkan di atas controller


class ProposalController extends Controller
{
    // READ: Menampilkan semua proposal (Halaman utama CRUD)
    public function index()
    {
        $proposals = Proposal::latest()->paginate(10);
        return view('proposal.index', compact('proposals'));
    }

    // CREATE: Menampilkan form untuk membuat proposal baru
    public function create()
    {
        return view('proposal.create');
    }

    // STORE: Menyimpan proposal baru ke database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judulProposal' => 'required|string|max:255',
            'nomorSurat' => 'required|string',
            'rw' => 'required|string',
            'jalan' => 'required|string',
            'tanggal' => 'required|date',
            'namaBarang' => 'required|string',
            'anggaran' => 'required|numeric',
            'namaKetuaRW' => 'required|string',
            'gambar1' => 'nullable|image|max:10240', // 10 MB
            'gambar2' => 'nullable|image|max:10240', // 10 MB

            // Tambahan field
            'lampiran' => 'nullable|string',
            'perihal' => 'required|string',
            'kodePos' => 'required|string',
            'tempatPenggunaan' => 'required|string',
            'jenisKegiatan' => 'required|string',
            'perencanaan' => 'required|string',
            'pengadaan' => 'required|string',
            'rehab' => 'required|string',
            'uji' => 'required|string',
        ]);

        if ($request->hasFile('gambar1')) {
            $validatedData['gambar1_path'] = $request->file('gambar1')->store('proposal_images', 'public');
        }
        if ($request->hasFile('gambar2')) {
            $validatedData['gambar2_path'] = $request->file('gambar2')->store('proposal_images', 'public');
        }

        // simpan ke database dan ambil instance
        $proposal = Proposal::create($validatedData);

        // redirect langsung ke show proposal
        return redirect()->route('proposal.show', $proposal->id)
            ->with('success', 'Proposal berhasil dibuat!');
    }

    // SHOW: Menampilkan detail satu proposal
    public function show(Proposal $proposal)
    {
        return view('proposal.show', compact('proposal'));
    }

    // EDIT: Menampilkan form untuk mengedit proposal
    public function edit(Proposal $proposal)
    {
        return view('proposal.edit', compact('proposal'));
    }

    // UPDATE: Memperbarui proposal di database
    public function update(Request $request, Proposal $proposal)
    {
        $validatedData = $request->validate([
            'judulProposal' => 'required|string|max:255',
            'nomorSurat' => 'required|string',
            'rw' => 'required|string',
            'jalan' => 'required|string',
            'tanggal' => 'required|date',
            'namaBarang' => 'required|string',
            'anggaran' => 'required|numeric',
            'namaKetuaRW' => 'required|string',
            'gambar1' => 'nullable|image|max:10240',
            'gambar2' => 'nullable|image|max:10240',

            // field tambahan
            'lampiran' => 'nullable|string',
            'perihal' => 'required|string',
            'kodePos' => 'required|string',
            'tempatPenggunaan' => 'required|string',
            'jenisKegiatan' => 'required|string',
            'perencanaan' => 'required|string',
            'pengadaan' => 'required|string',
            'rehab' => 'required|string',
            'uji' => 'required|string',
        ]);

        if ($request->hasFile('gambar1')) {
            if ($proposal->gambar1_path) {
                Storage::disk('public')->delete($proposal->gambar1_path);
            }
            $validatedData['gambar1_path'] = $request->file('gambar1')->store('proposal_images', 'public');
        }

        if ($request->hasFile('gambar2')) {
            if ($proposal->gambar2_path) {
                Storage::disk('public')->delete($proposal->gambar2_path);
            }
            $validatedData['gambar2_path'] = $request->file('gambar2')->store('proposal_images', 'public');
        }

        $proposal->update($validatedData);

        return redirect()->route('proposal.show', $proposal->id)
            ->with('success', 'Proposal berhasil diperbarui!');
    }

    // DESTROY: Menghapus proposal dari database
    public function destroy(Proposal $proposal)
    {
        if ($proposal->gambar1_path) {
            Storage::disk('public')->delete($proposal->gambar1_path);
        }
        if ($proposal->gambar2_path) {
            Storage::disk('public')->delete($proposal->gambar2_path);
        }

        $proposal->delete();

        return redirect()->route('proposal.index')->with('success', 'Proposal berhasil dihapus!');
    }
    public function download($id)
    {
        $proposal = Proposal::findOrFail($id);

        $pdf = Pdf::loadView('proposal.show-pdf', compact('proposal'))
            ->setPaper('a4', 'portrait');

        $fileName = 'Proposal_' . $proposal->judulProposal . '.pdf';
        return $pdf->download($fileName);
    }
}
