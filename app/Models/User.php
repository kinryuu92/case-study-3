<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class,'role_user',
            'user_id','role_id');
    }

    public function checkPermissionAccess($permissionCheck)
    {
//        use login co quyen add, sua danh muc va xem menu
//        B1 Lấy được các quyền của user đang login vào hệ thống
        $roles = auth()->user()->roles;
        foreach ($roles as $role)
        {
            $permission = $role->permissions;
           if ($permission->contains('key_code', $permissionCheck)){
               return true;
           }
        }
        return false;
//          B2 So sánh giá trị đưa vào của route hiện tại trong các quyền lấy được hay k

    }
}
