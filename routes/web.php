<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilLembagaController;
use App\Http\Controllers\ProfilKelurahanController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\AiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Profil Lembaga
Route::get('/profil-lembaga', [ProfilLembagaController::class, 'index'])
    ->name('profil-lembaga.index');

// Profil Kelurahan
Route::get('/profil-kelurahan', [ProfilKelurahanController::class, 'index'])
    ->name('profil-kelurahan');

// Resource route untuk Proposal
// Pastikan ini di **bawah** route spesifik agar tidak menimpa
Route::resource('proposal', ProposalController::class);
Route::get('/proposal/{id}/download', [ProposalController::class, 'download'])->name('proposal.download');

// ======================================================================
// === BAGIAN INI YANG DIPERBAIKI ===
// ======================================================================

// Rute ini sekarang langsung menampilkan halaman Blade, bukan memanggil controller
Route::get('/ai', function () {
    // Pastikan nama file blade Anda adalah 'ai-chat.blade.php'
    // atau sesuaikan dengan nama file Anda, misal: view('ai')
    return view('ai-chat');
})->name('ai.page');

// Rute ini sudah benar, JANGAN diubah
Route::post('/ai/chat', [AiController::class, 'chat'])->name('ai.chat');
