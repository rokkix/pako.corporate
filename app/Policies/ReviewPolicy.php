<?php

namespace Pako\Policies;
use Pako\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReviewPolicy
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
        return $user->canDo('ADD_REVIEWS');
    }
    public function edit(User $user) {
        return $user->canDo('EDIT_REVIEWS');
    }
    public function update(User $user) {
        return $user->canDo('EDIT_REVIEWS');
    }
    public function destroy(User $user) {
        return $user->canDo('DELETE_REVIEWS');
    }
}
