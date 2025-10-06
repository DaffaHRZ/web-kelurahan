<?php

// app/Policies/ProposalPolicy.php
namespace App\Policies;

use App\Models\Proposal;
use App\Models\User;

class ProposalPolicy
{
    /**
     * Izinkan admin melakukan apa saja.
     */
    public function before(User $user, string $ability): bool|null
    {
        if ($user->role === 'admin') {
            return true;
        }
        return null;
    }

    /**
     * Tentukan apakah user bisa melihat proposal.
     */
    public function view(User $user, Proposal $proposal): bool
    {
        // User hanya bisa lihat proposal dari RW-nya sendiri.
        return $user->rw === $proposal->rw;
    }

    /**
     * Tentukan apakah user bisa mengedit proposal.
     */
    public function update(User $user, Proposal $proposal): bool
    {
        // User hanya bisa edit proposal dari RW-nya sendiri.
        return $user->rw === $proposal->rw;
    }

    /**
     * Tentukan apakah user bisa menghapus proposal.
     */
    public function delete(User $user, Proposal $proposal): bool
    {
        // User hanya bisa hapus proposal dari RW-nya sendiri.
        return $user->rw === $proposal->rw;
    }
}
