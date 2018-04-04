<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_employee = new Permission();
        $role_employee->name = 'author';
        $role_employee->description = 'Article Author';
        $role_employee->save();

        $role_manager = new Permission();
        $role_manager->name = 'contributor';
        $role_manager->description = 'Article Contributor';
        $role_manager->save();

        $role_manager = new Permission();
        $role_manager->name = 'editor';
        $role_manager->description = 'Article Editor';
        $role_manager->save();
    }
}
