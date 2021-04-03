<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        //
    }


    public function view(User $user)
    {
        return  $user->checkPermissionAccess('category_list');
    }


    public function create(User $user)
    {
        return  $user->checkPermissionAccess('category_add');
    }


    public function update(User $user)
    {
        return  $user->checkPermissionAccess('category_edit');
    }

    public function delete(User $user)
    {
        return  $user->checkPermissionAccess('category_delete');
    }


}
