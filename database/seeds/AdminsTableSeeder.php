<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Admin::class, 50)->create();
        $admin = Admin::find(1);
        $admin->username = 'admin';
        $admin->role_id = 1;
        $admin->save();
    }
}
