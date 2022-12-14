<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::updateOrCreate(['name'=>'Administrator','guard_name'=>'web']);
        Role::updateOrCreate(['name'=>'User','guard_name'=>'web']);
    }
}
