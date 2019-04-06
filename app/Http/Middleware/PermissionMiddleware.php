<?php

namespace App\Http\Middleware;

use App\UserPermissions;
use Closure;
use Illuminate\Support\Facades\Auth;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param $permission_id
     * @return mixed
     */
    public function handle($request, Closure $next, $permission_id)
    {
        $userPermissions = new UserPermissions();
        $permissions = $userPermissions->getUserPermissions(Auth::id());

        if (!in_array($permission_id, $permissions->pluck('id')->toArray())) {
            return redirect('/home');
        }

        app()->instance('permissions', $permissions);

        return $next($request);
    }
}
