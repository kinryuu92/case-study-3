<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class AdminRoleControler extends Controller
{
    private $permission;
    private $role;
    public function __construct(Role $role, Permission $permission)
    {
        $this->role = $role;
        $this->permission = $permission;

    }

    public function index()
    {
        $roles = $this->role->paginate(5);
        return view('admin.role.index', compact('roles'));

    }

    public function create()
    {
        $permissionsParent = $this->permission->where('parent_id', 0)->get();
        return view('admin.role.add', compact('permissionsParent'));

    }
}
