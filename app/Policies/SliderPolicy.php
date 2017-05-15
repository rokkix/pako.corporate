<?php

namespace Pako\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Pako\User;

class SliderPolicy
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

    public function save(User $user){
        return $user->canDo('ADD_SLIDERS');
    }
    public function edit(User $user) {
        return $user->canDo('EDIT_SLIDERS');
    }
    public function destroy(User $user) {
        return $user->canDo('DELETE_SLIDERS');
    }
}
