<?php

namespace App\Policies;

use App\Models\SchoolYear;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SchoolYearPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        $roleJson = $user->group->permisstion ?? "";

        if (!empty($roleJson)) {
            $roleArr = json_decode($roleJson, true);
            $check = checkInput($roleArr, 'schoolyear');
            return $check;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, SchoolYear $schoolYear): bool
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
            $check = checkInput($roleArr, 'schoolyear', 'add');

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
            $check = checkInput($roleArr, 'schoolyear', 'edit');
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
            $check = checkInput($roleArr, 'schoolyear', 'delete');
            return $check;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, SchoolYear $schoolYear): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, SchoolYear $schoolYear): bool
    {
        //
    }
}
