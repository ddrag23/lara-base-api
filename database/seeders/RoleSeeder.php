<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect(['superadmin'])->each(function ($item) {
            if (is_null(Role::where('name', $item)->first())) {
                $role = Role::create(['name' => $item, 'guard_name' => 'api']);
                $role->syncPermissions([collect(Permission::all())->map(fn ($item) => $item->name)]);
            }
        });
    }
}
