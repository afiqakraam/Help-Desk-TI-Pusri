<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'pic-list',
            'pic-create',
            'pic-edit',
            'pic-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'admin-list',
            'admin-create',
            'admin-edit',
            'admin-delete',
            'create-ticket',
            'list-ticket',
            'process-ticket',
            'delete-ticket',
            'profile',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
