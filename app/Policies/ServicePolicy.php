<?php

namespace Pako\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Pako\User;

class ServicePolicy
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

    public function save(User $user) {
        return $user->canDo('ADD_SERVICES');
    }
    public function edit(User $user) {
        return $user->canDo('EDIT_SERVICES');
    }
    public function update(User $user) {
        return $user->canDo('EDIT_SERVICES');
    }
    public function destroy(User $user) {
        return $user->canDo('DELETE_SERVICES');
    }

}
