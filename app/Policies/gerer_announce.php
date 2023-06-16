<?php

namespace App\Policies;

use App\Models\User;
use App\Models\announce;
use Illuminate\Auth\Access\Response;

class gerer_announce
{

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, announce $announce): bool
    {
        return ($user->role == 'Annonceur' && $announce->user_id == $user->id) || $user->role == 'admin';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, announce $announce): bool
    {
        return ($user->role == 'Annonceur' && $announce->user_id == $user->id) || $user->role == 'admin';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, announce $announce): bool
    {
        return ($user->role == 'Annonceur' && $announce->user_id == $user->id) || $user->role == 'admin';
    }

    public function all(User $user){
        return $user->role == 'admin';
    }
}
