<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;




class AdminController extends Controller
{
    // Create a new role
    public function createRole(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);

        $role = Role::create(['name' => $request->input('name')]);

        return response()->json(['message' => 'Role created successfully', 'role' => $role]);
    }

    // Create a new permission
    public function createPermission(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name',
        ]);

        $permission = Permission::create(['name' => $request->input('name')]);

        return response()->json(['message' => 'Permission created successfully', 'permission' => $permission]);
    }

    // Assign a permission to a role
    public function assignPermissionToRole(Request $request, Role $role)
    {
        $request->validate([
            'permission_name' => 'required|exists:permissions,name',
        ]);

        $permission = Permission::where('name', $request->input('permission_name'))->first();
        $role->givePermissionTo($permission);

        return response()->json(['message' => 'Permission assigned to role successfully']);
    }

    // Assign a role to a user
    public function assignRoleToUser(Request $request, Role $role, User $user)
    {
        $user->assignRole($role);

        return response()->json(['message' => 'Role assigned to user successfully']);
    }

    // Remove a permission from a role
    public function removePermissionFromRole(Request $request, Role $role)
    {
        $request->validate([
            'permission_name' => 'required|exists:permissions,name',
        ]);

        $permission = Permission::where('name', $request->input('permission_name'))->first();
        $role->revokePermissionTo($permission);

        return response()->json(['message' => 'Permission removed from role successfully']);
    }

    // Remove a role from a user
    public function removeRoleFromUser(Request $request, Role $role, User $user)
    {
        $user->removeRole($role);

        return response()->json(['message' => 'Role removed from user successfully']);
    }

}

