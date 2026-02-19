<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::query()->delete();
        Role::query()->delete();

        $permissions = [
            'view products', 'create products', 'edit products', 'delete products',
            'view categories', 'create categories', 'edit categories', 'delete categories',
            'view transactions', 'create transactions'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo(Permission::all());

        $staffRole = Role::create(['name' => 'staff']);
        $staffRole->givePermissionTo([
            'view products', 'view transactions', 'create transactions'
        ]);

        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo(['view products']);
    }
}