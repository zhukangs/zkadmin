<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name'=>'超级管理员',
            'introduction' => '拥有所有权限',
        ]);
        Role::create([
            'name'=>'普通管理员',
            'introduction' => '拥有部分权限',
        ]);
    }
}
