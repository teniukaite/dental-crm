<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ServiceCategory;
use Illuminate\Auth\Access\HandlesAuthorization;

class ServiceCategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_service::category');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ServiceCategory  $serviceCategory
     * @return bool
     */
    public function view(User $user, ServiceCategory $serviceCategory): bool
    {
        return $user->can('view_service::category');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->can('create_service::category');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ServiceCategory  $serviceCategory
     * @return bool
     */
    public function update(User $user, ServiceCategory $serviceCategory): bool
    {
        return $user->can('update_service::category');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ServiceCategory  $serviceCategory
     * @return bool
     */
    public function delete(User $user, ServiceCategory $serviceCategory): bool
    {
        return $user->can('delete_service::category');
    }

    /**
     * Determine whether the user can bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_service::category');
    }

    /**
     * Determine whether the user can permanently delete.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ServiceCategory  $serviceCategory
     * @return bool
     */
    public function forceDelete(User $user, ServiceCategory $serviceCategory): bool
    {
        return $user->can('force_delete_service::category');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_service::category');
    }

    /**
     * Determine whether the user can restore.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ServiceCategory  $serviceCategory
     * @return bool
     */
    public function restore(User $user, ServiceCategory $serviceCategory): bool
    {
        return $user->can('restore_service::category');
    }

    /**
     * Determine whether the user can bulk restore.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_service::category');
    }

    /**
     * Determine whether the user can replicate.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ServiceCategory  $serviceCategory
     * @return bool
     */
    public function replicate(User $user, ServiceCategory $serviceCategory): bool
    {
        return $user->can('replicate_service::category');
    }

    /**
     * Determine whether the user can reorder.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_service::category');
    }

}
