<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
public function run()
{
    // Roles
    $adminRole = Role::create(['name' => 'admin']);
    $authorRole = Role::create(['name' => 'author']);

    // Permissions
    $managePostsPermission = Permission::create(['name' => 'manage posts']);
    // Define other permissions

    // Assign permissions to roles
    $adminRole->givePermissionTo($managePostsPermission);
    // Assign other permissions as needed
}
}
