<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Programs')->insert([
            ['programName' => 'Bachelor of Science in Information Technology'],
            ['programName' => 'Bachelor of Science in Computer Science'],
            ['programName' => 'Bachelor of Science in Civil Engineering'],
            ['programName' => 'Bachelor of Science in Electrical Engineering'],
            ['programName' => 'Bachelor of Science in Mechanical Engineering'],
        ]);
    }
}
