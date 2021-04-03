<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    public function view(User $user)
    {
        return  $user->checkPermissionAccess('product_list');
    }

    public function create(User $user)
    {
        return  $user->checkPermissionAccess('product_add');

    }

    public function update(User $user, $id)
    {
        $product = Product::find($id);
        if ($user->checkPermissionAccess('product_edit') && $user->id === $product->user_id)
        {
            return true;
        }
        return false;
    }

    public function delete(User $user)
    {
        return  $user->checkPermissionAccess('product_delete');
    }

}
