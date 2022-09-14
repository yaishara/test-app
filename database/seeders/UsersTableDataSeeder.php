<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate(
            [
                'email'   => 'admin@wearedesigners.net',
            ],[
            'name' => 'Admin',
            'email' => 'admin@wearedesigners.net',
            'password' => Hash::make('654321'),
        ]);
    }
}
