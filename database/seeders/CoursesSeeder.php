<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Courses')->insert([
            // Information Technology Courses
            ['courseID' => 'IT101', 'courseName' => 'Introduction to IT', 'program' => 'Bachelor of Science in Information Technology'],
            ['courseID' => 'IT102', 'courseName' => 'Database Systems', 'program' => 'Bachelor of Science in Information Technology'],
            ['courseID' => 'IT103', 'courseName' => 'Web Development', 'program' => 'Bachelor of Science in Information Technology'],

            // Computer Science Courses
            ['courseID' => 'CS101', 'courseName' => 'Introduction to Computer Science', 'program' => 'Bachelor of Science in Computer Science'],
            ['courseID' => 'CS102', 'courseName' => 'Algorithms and Data Structures', 'program' => 'Bachelor of Science in Computer Science'],
            ['courseID' => 'CS103', 'courseName' => 'Artificial Intelligence', 'program' => 'Bachelor of Science in Computer Science'],

            // Civil Engineering Courses
            ['courseID' => 'CE101', 'courseName' => 'Statics and Dynamics', 'program' => 'Bachelor of Science in Civil Engineering'],
            ['courseID' => 'CE102', 'courseName' => 'Structural Analysis', 'program' => 'Bachelor of Science in Civil Engineering'],
            ['courseID' => 'CE103', 'courseName' => 'Hydraulics', 'program' => 'Bachelor of Science in Civil Engineering'],

            // Electrical Engineering Courses
            ['courseID' => 'EE101', 'courseName' => 'Circuit Theory', 'program' => 'Bachelor of Science in Electrical Engineering'],
            ['courseID' => 'EE102', 'courseName' => 'Power Systems', 'program' => 'Bachelor of Science in Electrical Engineering'],
            ['courseID' => 'EE103', 'courseName' => 'Control Systems', 'program' => 'Bachelor of Science in Electrical Engineering'],

            // Mechanical Engineering Courses
            ['courseID' => 'ME101', 'courseName' => 'Thermodynamics', 'program' => 'Bachelor of Science in Mechanical Engineering'],
            ['courseID' => 'ME102', 'courseName' => 'Fluid Mechanics', 'program' => 'Bachelor of Science in Mechanical Engineering'],
            ['courseID' => 'ME103', 'courseName' => 'Machine Design', 'program' => 'Bachelor of Science in Mechanical Engineering'],
        ]);
    }
}
