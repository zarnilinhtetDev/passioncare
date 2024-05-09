<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',

            'email_verified_at' => now(),
            'type' => 'mo',
            'level' => '3',
            'password' => bcrypt('admin'), // passwrod
            'is_admin' => 1
        ]);
    }
}
