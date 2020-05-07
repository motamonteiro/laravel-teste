<?php

namespace App\Http\Controllers;

use App\Permission;
use App\User;
use App\UserPermissions;
use Illuminate\Http\Request;

class UserPermissionController extends Controller
{
    /**
     * @var UserPermissions
     */
    private $userPermissions;
    /**
     * @var User
     */
    private $user;
    /**
     * @var Permission
     */
    private $permission;

    public function __construct(UserPermissions $userPermissions, User $user, Permission $permission)
    {
        $this->user = $user;
        $this->userPermissions = $userPermissions;
        $this->permission = $permission;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $user_id
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id)
    {
        $this->user = $this->user->find($user_id);

        if (!$this->user) {
            return redirect()->route('users.index')->with(['type'=> 'danger', 'message'=> __('User not found')]);
        }

        if ($this->user->is_admin) {
            return redirect()->route('users.index')->with(['type'=> 'danger', 'message'=> __('Permission Denied')]);
        }

        $data = [
            'user' => $this->user,
            'permissions' => $this->permission->all(),
            'userPermissionsId' => $this->userPermissions->getUserPermissionsId($user_id),
        ];

        return view('user-permissions.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->user = $this->user->find($id);

        if (!$this->user) {
            return redirect()->route('users.index')->with(['type'=> 'danger', 'message'=> __('User not found')]);
        }

        if ($this->user->is_admin) {
            return redirect()->route('users.index')->with(['type'=> 'danger', 'message'=> __('Permission Denied')]);
        }

        $validatedData = $request->validate([
            'name'  => 'required|string',
            'email' => 'required|email',
            'password' => 'nullable|confirmed|min:6',
        ]);

        if ($validatedData['password'] == '') {
            unset($validatedData['password']);
        } else {
            $validatedData['password'] = bcrypt($validatedData['password']);
        }

        $this->user->update($validatedData);

        return redirect()->route('users.index')->with(['type'=> 'success', 'message'=> __('User successfully updated')]);
    }
}
