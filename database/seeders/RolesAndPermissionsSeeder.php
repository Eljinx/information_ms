<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        // Create Permissions for Users
        $userPermissions = [
            ['name' => 'view users'],
            ['name' => 'create users'],
            ['name' => 'edit users'],
            ['name' => 'delete users'],
        ];

        foreach ($userPermissions as $permission) {
            Permission::firstOrCreate($permission);
        }

        // Create Permissions for Roles & Permissions
        $rolePermissions = [
            ['name' => 'view roles'],
            ['name' => 'create roles'],
            ['name' => 'edit roles'],
            ['name' => 'delete roles'],
            ['name' => 'assign permissions'],
        ];

        foreach ($rolePermissions as $permission) {
            Permission::firstOrCreate($permission);
        }

        // Create Roles
        $adminRole = Role::firstOrCreate(['name' => 'Admin', ]);
        $editorRole = Role::firstOrCreate(['name' => 'Editor', ]);
        $viewerRole = Role::firstOrCreate(['name' => 'Viewer',  ]);

        // Assign permissions to Admin Role
        $allPermissions = Permission::all();
        $adminRole->syncPermissions($allPermissions);

        // Assign permissions to Editor Role
        $editorPermissions = Permission::whereIn('name', [
            'view users',
            'create users',
            'edit users',
            'view roles',
        ])->get();
        $editorRole->syncPermissions($editorPermissions);

        // Assign permissions to Viewer Role
        $viewerPermissions = Permission::whereIn('name', [
            'view users',
            'view roles',
        ])->get();
        $viewerRole->syncPermissions($viewerPermissions);
    }
}

