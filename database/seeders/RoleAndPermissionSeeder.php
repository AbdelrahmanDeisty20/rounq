<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleAndPermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        Permission::firstOrCreate(['name' => 'add images']);
        Permission::firstOrCreate(['name' => 'edit images']);
        Permission::firstOrCreate(['name' => 'delete images']);
        Permission::firstOrCreate(['name' => 'manage users']);
        Permission::firstOrCreate(['name' => 'manage settings']);

        // Create roles and assign created permissions

        // Admin role
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $adminRole->syncPermissions(Permission::all());

        // User role
        $userRole = Role::firstOrCreate(['name' => 'user']);
        $userRole->syncPermissions(['add images', 'edit images']);

        // Create Super Admin User
        $admin = User::updateOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('11223344'), // You should change this later
            ]
        );
        $admin->assignRole($adminRole);

        $this->command->info('Roles and Permissions seeded successfully!');
        $this->command->info('Admin user created: admin@admin.com / password');
    }
}
