<?php

namespace App\Policies;

use App\Models\Evaluation;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class EvaluationPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        $roleJson = $user->group->permisstion ?? "";

        if (!empty($roleJson)) {
            $roleArr = json_decode($roleJson, true);
            $check = checkInput($roleArr, 'evaluations');

            return $check;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Evaluation $evaluation): bool
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
            $check = checkInput($roleArr, 'evaluations', 'add');
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
            $check = checkInput($roleArr, 'evaluations', 'edit');
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
            $check = checkInput($roleArr, 'evaluations', 'delete');
            return $check;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Evaluation $evaluation): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Evaluation $evaluation): bool
    {
        //
    }
}