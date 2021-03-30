<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserControler extends Controller
{
    private $user;
    private $role;
    public function __construct(User $user, Role $role)
    {
        $this->role = $role;
        $this->user = $user;
    }

    public function index()
    {
        $users = $this->user->paginate(5);
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        $roles = $this->role->all();
        return view('admin.user.add', compact('roles'));
    }

    public function store(Request $request)
    {
        $user = $this->user->create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
        ]);
        $roleIds = $request->role_id;
        $user->roles()->attach($roleIds);
        return redirect()->route('users.index');
//        foreach ($roleIds as $roleItem) {
//            DB::table('role_user')->insert([
//                'role_id' => $roleItem,
//                'user_id' => $user->id
//            ]);
//        }
    }
}
