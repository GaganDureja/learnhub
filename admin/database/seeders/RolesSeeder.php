<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'Master',
            'SuperAdmin',
            'Admin',
            'SubAdmin',
            'Instructor',
        ];
        foreach ($roles as $roleName) {
            Role::firstOrCreate(['name' => $roleName, 'guard_name' => 'web']);
        }
        $masterRole = Role::where('name', 'Master')->first();
        if ($masterRole) {
            $masterRole->syncPermissions(Permission::all());
        }
    }
}
