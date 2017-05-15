<?php

namespace Pako\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Pako\User;

class PortfolioPolicy
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
        return $user->canDo('ADD_PORTFOLIO');
    }
    public function edit(User $user) {
        return $user->canDo('EDIT_PORTFOLIO');
    }
    public function destroy(User $user) {
        return $user->canDo('DELETE_PORTFOLIO');
    }

}
