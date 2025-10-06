<?php

namespace App\Providers;

// 1. Import Model dan Policy yang akan didaftarkan
use App\Models\Proposal;
use App\Policies\ProposalPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * Di sinilah kita memberitahu Laravel untuk menggunakan
     * ProposalPolicy setiap kali ada pengecekan otorisasi
     * untuk model Proposal.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // Daftarkan policy Anda di sini
        Proposal::class => ProposalPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Pendaftaran policy di atas akan secara otomatis diproses oleh Laravel.
        // Jadi, untuk kasus ini, kita tidak perlu menambahkan kode apa pun di sini.
    }
}
