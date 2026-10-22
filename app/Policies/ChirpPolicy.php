<?php

namespace App\Policies;

use App\Models\Chirp;
use App\Models\User;

class ChirpPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Chirp $chirp): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Chirp $chirp): bool
    {
        return $chirp->user()->is($user);
    }

    public function delete(User $user, Chirp $chirp): bool
    {
        return $chirp->user()->is($user);
    }

    public function restore(User $user, Chirp $chirp): bool
    {
        return false;
    }

    public function forceDelete(User $user, Chirp $chirp): bool
    {
        return false;
    }
}