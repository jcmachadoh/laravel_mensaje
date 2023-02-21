<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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

    public function edit(User $authUser, User $user)
    {
        dd($authUser);
        return $authUser->id === $user->id;
    }

    public function show(User $authUser, User $user)
    {
        dd($authUser);
        return $authUser->id === $user->id;
    }
}
