<?php

use Illuminate\Database\Seeder;
use \App\Models\Permission;
use \App\Models\Role;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('name', '超级管理员')->first();
        $permission = Permission::create([
            'name' => '全部权限',
            'routes' => ["admin","admin/logout","admin/lock","admin/icon","admin/upload","admin/system/administrator","admin/system/administrator/edit/{id}","admin/system/administrator/update/{id}","admin/system/administrator/create","admin/system/administrator/store","admin/system/administrator/del/{id}","admin/system/role","admin/system/role/create","admin/system/role/store","admin/system/role/edit/{id}","admin/system/role/update/{id}","admin/system/role/del/{id}","admin/system/menu","admin/system/menu/create","admin/system/menu/store","admin/system/menu/edit/{id}","admin/system/menu/update/{id}","admin/system/menu/del/{id}","admin/system/permission","admin/system/permission/create","admin/system/permission/store","admin/system/permission/edit/{id}","admin/system/permission/update/{id}","admin/system/permission/del/{id}"],
        ]);
        $role->toPermissions()->attach($permission);
    }
}
