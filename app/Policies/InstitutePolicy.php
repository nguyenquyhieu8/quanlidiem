<?php

namespace App\Policies;

use App\Models\User;
use App\Models\institute;
use Illuminate\Auth\Access\Response;

class InstitutePolicy
{
    /**
     * Determine whether the user can view any models.
     */

    public function viewAny(User $user): bool
    {
        $roleJson = $user->group->permisstion ?? "";

        if (!empty($roleJson)) {
            $roleArr = json_decode($roleJson, true);
            $check = checkInput($roleArr, 'institutes');

            return $check;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, institute $institute): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        $roleJson = $user->group->permisstion ?? "";

        if (!empty($roleJson)) {
            $roleArr = json_decode($roleJson, true);
            $check = checkInput($roleArr, 'institutes', 'add');
            return $check;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
        $roleJson = $user->group->permisstion ?? "";

        if (!empty($roleJson)) {
            $roleArr = json_decode($roleJson, true);
            $check = checkInput($roleArr, 'institutes', 'edit');
            return $check;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
        $roleJson = $user->group->permisstion ?? "";

        if (!empty($roleJson)) {
            $roleArr = json_decode($roleJson, true);
            $check = checkInput($roleArr, 'institutes', 'delete');
            return $check;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, institute $institute): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, institute $institute): bool
    {
        //
    }
}
