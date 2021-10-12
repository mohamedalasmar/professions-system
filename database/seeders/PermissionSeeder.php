<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Permission::create(['name' => 'create-specailty', 'guard_name' => 'web']);
        Permission::create(['name' => 'edit-specailty', 'guard_name' => 'web']);
        Permission::create(['name' => 'index-specailty', 'guard_name' => 'web']);
        Permission::create(['name' => 'delete-specailty', 'guard_name' => 'web']);
    }
}
