<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
public function handle($request, Closure $next, ...$rolesOrPermissions)
{
    $user = $request->user();

    foreach ($rolesOrPermissions as $roleOrPermission) {
        if ($user->hasRole($roleOrPermission) || $user->hasPermissionTo($roleOrPermission)) {
            return $next($request);
        }
    }

    return response()->json(['message' => 'Unauthorized'], 403);
}
}
