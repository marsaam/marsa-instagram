<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bios')->insert([
            [
                'user_id' => '1',
                'bio' => '"To anyone that ever told you you aue no good... they are no better." — Hayley Williams',
            ],
            [
                'user_id' => '2',
                'bio' => '"To anyone that ever told you you aue no good... they are no better." — Hayley Williams',
            ],
        ]);
    }
}
