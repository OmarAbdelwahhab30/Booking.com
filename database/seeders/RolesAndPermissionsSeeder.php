<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'properties-manage',
            'bookings-manage',
        ];

        $PermissionsWithRoles = [
            'Administrator'     => ['properties-manage', 'bookings-manage'],
            "Property Owner"    => ['properties-manage'],
            "Simple User"       => ['bookings-manage'],
        ];

        foreach ($permissions as $permission){
            Permission::create(['name' => $permission]);
        }

        foreach ($PermissionsWithRoles as $role => $permissions){
            $role = Role::create(['name' => $role])->givePermissionTo($permissions);
        }
    }
}
