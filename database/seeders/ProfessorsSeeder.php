<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfessorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Professors')->insert([
            ['Name' => 'Dr. John Doe'],
            ['Name' => 'Dr. Jane Smith'],
            ['Name' => 'Mr. Mark Johnson'],
            ['Name' => 'Mrs. Emily Brown'],
            ['Name' => 'Dr. David Wilson'],
            ['Name' => 'Ms. Lisa White'],
            ['Name' => 'Engr. Robert Green'],
            ['Name' => 'Mrs. Linda Hall'],
            ['Name' => 'Dr. James Allen'],
            ['Name' => 'Ms. Karen Taylor'],
            ['Name' => 'Dr. Paul Harris'],
            ['Name' => 'Dr. Laura Lewis'],
            ['Name' => 'Mr. Peter Moore'],
            ['Name' => 'Mrs. Michelle Thompson'],
            ['Name' => 'Dr. Mark Davis'],
            ['Name' => 'Ms. Anna Martin'],
            ['Name' => 'Engr. Robert Jackson'],
            ['Name' => 'Ms. Susan White'],
            ['Name' => 'Mr. James Adams'],
            ['Name' => 'Ms. Karen Phillips'],
            ['Name' => 'Engr. Richard Evans'],
            ['Name' => 'Mrs. Sarah Clark'],
            ['Name' => 'Dr. William Lewis'],
            ['Name' => 'Ms. Emily Scott'],
            ['Name' => 'Engr. George Hall'],
            ['Name' => 'Mr. Aleks Guarin'],
        ]);
    }
}
