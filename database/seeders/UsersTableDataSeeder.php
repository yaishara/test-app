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
        $user1= User::updateOrCreate(
            [
                'email'   => 'admin@wearedesigners.net',
            ],[
            'name' => 'Admin',
            'email' => 'admin@wearedesigners.net',
            'password' => Hash::make('654321'),
        ]);

        if ($user1->wasRecentlyCreated) {
            $user1->assignRole('Administrator');
        }
    }
}
