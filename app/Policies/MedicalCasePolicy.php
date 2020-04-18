<?php

namespace App\Policies;

use App\MedicalCase;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MedicalCasePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('cases.list');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\MedicalCase  $medicalCase
     * @return mixed
     */
    public function view(User $user, MedicalCase $medicalCase)
    {
        return $user->hasPermissionTo('cases.read');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('cases.create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\MedicalCase  $medicalCase
     * @return mixed
     */
    public function update(User $user, MedicalCase $medicalCase)
    {
        return $user->hasPermissionTo('cases.edit');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\MedicalCase  $medicalCase
     * @return mixed
     */
    public function delete(User $user, MedicalCase $medicalCase)
    {
        return $user->hasPermissionTo('cases.delete');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\MedicalCase  $medicalCase
     * @return mixed
     */
    public function restore(User $user, MedicalCase $medicalCase)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\MedicalCase  $medicalCase
     * @return mixed
     */
    public function forceDelete(User $user, MedicalCase $medicalCase)
    {
        return false;
    }
}
