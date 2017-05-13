<?php

namespace Pako\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Pako\User;

class PermissionPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function change(User $user) {
        return $user->canDo('EDIT_PERMISSIONS');
    }
}
