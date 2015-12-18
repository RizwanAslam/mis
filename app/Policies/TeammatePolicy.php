<?php

namespace App\Policies;

class TeammatePolicy
{
    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function before($user, $ability)
    {
        return $user->isSuperAdmin();
    }

    public function index($user)
    {
        dd('i am allowed');
    }
}
