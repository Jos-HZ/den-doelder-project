<?php

namespace App\Policies;

use App\Models\Backlog;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BacklogPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function view(User $user, Backlog $backlog)
    {
        return TRUE;
    }

    public function edit(User $user, Backlog $backlog)
    {
        return $user->role === 'production';
    }

    public function delete(User $user, Backlog $backlog)
    {
        return $user->role === 'production';
    }
}
