<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Xóa cache
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Tạo permissions
        Permission::firstOrCreate(['name' => 'view categories']);
        Permission::firstOrCreate(['name' => 'view tours']);
        Permission::firstOrCreate(['name' => 'manage users']);

        // Tạo roles và gán quyền
        Role::firstOrCreate(['name' => 'admin'])->givePermissionTo(Permission::all());
        Role::firstOrCreate(['name' => 'editor'])->givePermissionTo(['view categories', 'view tours']);
        Role::firstOrCreate(['name' => 'categoryMng'])->givePermissionTo(['view categories']);
        Role::firstOrCreate(['name' => 'tourMng'])->givePermissionTo(['view tours']);
    }
}
