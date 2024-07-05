<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = ['user management-read', 'user management-update', 'user management-create', 'user management-delete', 'user management-detail'];
        collect($permissions)->each(function ($item) {
            $permission = Permission::where("name", $item)->first();
            if (is_null($permission)) {
                Permission::create(['name' => $item, 'guard_name' => 'api']);
            }
        });
    }
}
