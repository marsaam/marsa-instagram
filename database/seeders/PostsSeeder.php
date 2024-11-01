<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'photo' => 'photo1.jpg',
                'caption' => 'Caption for photo1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'photo' => 'photo2.jpg',
                'caption' => 'Caption for photo2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'photo' => 'photo3.jpeg',
                'caption' => 'Caption for photo3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'photo' => 'photo1.jpg',
                'caption' => 'Caption for photo1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'photo' => 'photo2.jpg',
                'caption' => 'Caption for photo2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'photo' => 'photo3.jpeg',
                'caption' => 'Caption for photo3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'photo' => 'photo1.jpg',
                'caption' => 'Caption for photo1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'photo' => 'photo2.jpg',
                'caption' => 'Caption for photo2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'photo' => 'photo3.jpeg',
                'caption' => 'Caption for photo3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'photo' => 'photo1.jpg',
                'caption' => 'Caption for photo1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'photo' => 'photo2.jpg',
                'caption' => 'Caption for photo2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
