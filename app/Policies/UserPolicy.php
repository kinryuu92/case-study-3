<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{

    public function view(User $user)
    {
        return $user->checkPermissionAccess('user_list');
    }

    public function create(User $user)
    {
        return $user->checkPermissionAccess('user_add');
    }

    public function update(User $user)
    {
        return $user->checkPermissionAccess('user_edit');
    }


    public function delete(User $user)
    {
        return $user->checkPermissionAccess('user_delete');
    }
}
