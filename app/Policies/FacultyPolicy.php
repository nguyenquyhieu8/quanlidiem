<?php

namespace App\Policies;

use App\Models\Faculty;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class FacultyPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        $roleJson = $user->group->permisstion ?? "";

        if (!empty($roleJson)) {
            $roleArr = json_decode($roleJson, true);
            $check = checkInput($roleArr, 'faculties');

            return $check;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Faculty $faculty): bool
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
            $check = checkInput($roleArr, 'faculties', 'add');
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
            $check = checkInput($roleArr, 'faculties', 'edit');
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
            $check = checkInput($roleArr, 'faculties', 'delete');
            return $check;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Faculty $faculty): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Faculty $faculty): bool
    {
        //
    }
}
