<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPermissions extends Model
{
    protected $table = 'user_permissions';

    protected $fillable = [
        'user_id',
        'permission_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }

    public function getUserPermissions($user_id)
    {
        $permissions = [];
        $userPermissions = $this->with('permission')->where('user_id', $user_id)->get();
        foreach ($userPermissions as $userPermission) {
            array_push($permissions, $userPermission->permission);
        }
        return collect($permissions);
    }

}
