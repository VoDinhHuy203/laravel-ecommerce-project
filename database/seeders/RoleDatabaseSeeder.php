<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'super-admin', 'display_name' => 'Super Admin', 'group' => 'system'],
            ['name' => 'admin', 'display_name' => 'Admin', 'group' => 'system'],
            ['name' => 'employee', 'display_name' => 'employee', 'group' => 'system'],
            ['name' => 'manager', 'display_name' => 'manager', 'group' => 'system'],
            ['name' => 'user', 'display_name' => 'user', 'group' => 'system'],
        ];

        foreach ($roles as $role) {
            Role::updateOrCreate($role);
        }

        $permissions = [
            ['name' => 'create-user', 'display_name' => 'Create user', 'group' => 'User'],
            ['name' => 'store-user', 'display_name' => 'Store user', 'group' => 'User'],
            ['name' => 'show-user', 'display_name' => 'Show user', 'group' => 'User'],
            ['name' => 'delete-user', 'display_name' => 'Delete user', 'group' => 'User'],

            ['name' => 'create-role', 'display_name' => 'Create role', 'group' => 'role'],
            ['name' => 'store-role', 'display_name' => 'Store role', 'group' => 'role'],
            ['name' => 'show-role', 'display_name' => 'Show role', 'group' => 'role'],
            ['name' => 'delete-role', 'display_name' => 'Delete role', 'group' => 'role'],

            ['name' => 'create-product', 'display_name' => 'Create product', 'group' => 'product'],
            ['name' => 'store-product', 'display_name' => 'Store product', 'group' => 'product'],
            ['name' => 'show-product', 'display_name' => 'Show product', 'group' => 'product'],
            ['name' => 'delete-product', 'display_name' => 'Delete product', 'group' => 'product'],

            ['name' => 'create-coupon', 'display_name' => 'Create coupon', 'group' => 'coupon'],
            ['name' => 'store-coupon', 'display_name' => 'Store coupon', 'group' => 'coupon'],
            ['name' => 'show-coupon', 'display_name' => 'Show coupon', 'group' => 'coupon'],
            ['name' => 'delete-coupon', 'display_name' => 'Delete coupon', 'group' => 'coupon'],

            ['name' => 'create-category', 'display_name' => 'Create category', 'group' => 'category'],
            ['name' => 'store-category', 'display_name' => 'Store category', 'group' => 'category'],
            ['name' => 'show-category', 'display_name' => 'Show category', 'group' => 'category'],
            ['name' => 'delete-category', 'display_name' => 'Delete category', 'group' => 'category'],
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate($permission);
        }
    }
}
