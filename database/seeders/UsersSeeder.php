<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'John Doe',
                'email' => 'johndoe@example.com',
                'username' => 'johndoe',
                'avatar' => '1.png',
                // 'bio' => '"To anyone that ever told you you aue no good... they are no better." — Hayley Williams',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Doe',
                'email' => 'janedoe@example.com',
                'username' => 'janedoe',
                'avatar' => '1.png',
                'password' => Hash::make('password456'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
