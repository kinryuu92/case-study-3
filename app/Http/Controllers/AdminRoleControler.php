<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;

class AdminRoleControler extends Controller
{
    use DeleteModelTrait;
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

    public function store(Request $request)
    {
        $role = $this->role->create([
            'name' => $request->name,
            'display_name' => $request->display_name,
        ]);
        $role->permissions()->attach($request->permission_id);
        return redirect()->route('roles.index');
    }

    public function edit($id)
    {
        $role = $this->role->find($id);
        $permissionsCheked = $role->permissions;
        $permissionsParent = $this->permission->where('parent_id', 0)->get();
        return view('admin.role.edit', compact('permissionsParent', 'role', 'permissionsCheked'));
    }

    public function update($id, Request $request)
    {
        $role = $this->role->find($id);
        $role->update([
            'name' => $request->name,
            'display_name' => $request->display_name,
        ]);

        $role->permissions()->sync($request->permission_id);
        return redirect()->route('roles.index');
    }

    public function delete($id)
    {
       return $this->deleteModelTrait($id, $this->role);
    }

}
