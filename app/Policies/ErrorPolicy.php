<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Error;
use Illuminate\Auth\Access\HandlesAuthorization;

class ErrorPolicy
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

    public function view(User $user, Error $error)
    {
        return TRUE;
    }

    public function edit(User $user, Error $error)
    {
        return $user->role === 'production';
    }

    public function delete(User $user, Error $error)
    {
        return $user->role === 'production';
    }
}
