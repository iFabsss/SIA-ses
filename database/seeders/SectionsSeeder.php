<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Sections')->insert([
            // Information Technology Courses Sections
            ['sectionID' => 'IT101-001', 'courseID' => 'IT101', 'professor' => 1, 'schedule' => json_encode(['days' => ['Mon', 'Wed', 'Fri'], 'startTime' => '08:00', 'endTime' => '09:30', 'room' => 'B101'])],
            ['sectionID' => 'IT101-002', 'courseID' => 'IT101', 'professor' => 2, 'schedule' => json_encode(['days' => ['Tue', 'Thu'], 'startTime' => '10:00', 'endTime' => '11:30', 'room' => 'B102'])],
            ['sectionID' => 'IT101-003', 'courseID' => 'IT101', 'professor' => 1, 'schedule' => json_encode(['days' => ['Mon', 'Wed', 'Fri'], 'startTime' => '15:00', 'endTime' => '16:30', 'room' => 'B103'])],
            ['sectionID' => 'IT101-004', 'courseID' => 'IT101', 'professor' => 2, 'schedule' => json_encode(['days' => ['Tue', 'Thu'], 'startTime' => '14:00', 'endTime' => '15:30', 'room' => 'B104'])],

            ['sectionID' => 'IT102-001', 'courseID' => 'IT102', 'professor' => 3, 'schedule' => json_encode(['days' => ['Mon', 'Wed', 'Fri'], 'startTime' => '13:00', 'endTime' => '14:30', 'room' => 'C101'])],
            ['sectionID' => 'IT102-002', 'courseID' => 'IT102', 'professor' => 4, 'schedule' => json_encode(['days' => ['Mon', 'Wed', 'Fri'], 'startTime' => '10:00', 'endTime' => '11:30', 'room' => 'C102'])],
            ['sectionID' => 'IT102-003', 'courseID' => 'IT102', 'professor' => 3, 'schedule' => json_encode(['days' => ['Tue', 'Thu'], 'startTime' => '11:00', 'endTime' => '12:30', 'room' => 'C103'])],

            ['sectionID' => 'IT103-001', 'courseID' => 'IT103', 'professor' => 5, 'schedule' => json_encode(['days' => ['Tue', 'Thu'], 'startTime' => '09:00', 'endTime' => '10:30', 'room' => 'D201'])],
            ['sectionID' => 'IT103-002', 'courseID' => 'IT103', 'professor' => 5, 'schedule' => json_encode(['days' => ['Mon', 'Wed'], 'startTime' => '10:00', 'endTime' => '11:30', 'room' => 'D202'])],
            ['sectionID' => 'IT103-003', 'courseID' => 'IT103', 'professor' => 6, 'schedule' => json_encode(['days' => ['Tue', 'Thu'], 'startTime' => '13:00', 'endTime' => '14:30', 'room' => 'D203'])],

            // Computer Science Courses Sections
            ['sectionID' => 'CS101-001', 'courseID' => 'CS101', 'professor' => 7, 'schedule' => json_encode(['days' => ['Mon', 'Wed'], 'startTime' => '08:00', 'endTime' => '09:30', 'room' => 'E101'])],
            ['sectionID' => 'CS101-002', 'courseID' => 'CS101', 'professor' => 7, 'schedule' => json_encode(['days' => ['Tue', 'Thu'], 'startTime' => '10:00', 'endTime' => '11:30', 'room' => 'F101'])],
            ['sectionID' => 'CS101-003', 'courseID' => 'CS101', 'professor' => 8, 'schedule' => json_encode(['days' => ['Mon', 'Wed', 'Fri'], 'startTime' => '14:00', 'endTime' => '15:30', 'room' => 'E102'])],
            ['sectionID' => 'CS101-004', 'courseID' => 'CS101', 'professor' => 8, 'schedule' => json_encode(['days' => ['Tue', 'Thu'], 'startTime' => '16:00', 'endTime' => '17:30', 'room' => 'F102'])],

            ['sectionID' => 'CS102-001', 'courseID' => 'CS102', 'professor' => 9, 'schedule' => json_encode(['days' => ['Mon', 'Wed'], 'startTime' => '13:00', 'endTime' => '14:30', 'room' => 'G101'])],
            ['sectionID' => 'CS102-002', 'courseID' => 'CS102', 'professor' => 10, 'schedule' => json_encode(['days' => ['Mon', 'Wed', 'Fri'], 'startTime' => '09:00', 'endTime' => '10:30', 'room' => 'G102'])],
            ['sectionID' => 'CS102-003', 'courseID' => 'CS102', 'professor' => 9, 'schedule' => json_encode(['days' => ['Tue', 'Thu'], 'startTime' => '14:00', 'endTime' => '15:30', 'room' => 'G103'])],

            ['sectionID' => 'CS103-001', 'courseID' => 'CS103', 'professor' => 11, 'schedule' => json_encode(['days' => ['Mon', 'Wed', 'Fri'], 'startTime' => '13:00', 'endTime' => '14:30', 'room' => 'H101'])],
            ['sectionID' => 'CS103-002', 'courseID' => 'CS103', 'professor' => 12, 'schedule' => json_encode(['days' => ['Mon', 'Wed'], 'startTime' => '10:00', 'endTime' => '11:30', 'room' => 'H102'])],
            ['sectionID' => 'CS103-003', 'courseID' => 'CS103', 'professor' => 13, 'schedule' => json_encode(['days' => ['Tue', 'Thu'], 'startTime' => '09:00', 'endTime' => '10:30', 'room' => 'H103'])],

            // Civil Engineering Courses Sections
            ['sectionID' => 'CE101-001', 'courseID' => 'CE101', 'professor' => 14, 'schedule' => json_encode(['days' => ['Tue', 'Thu'], 'startTime' => '08:00', 'endTime' => '09:30', 'room' => 'I101'])],
            ['sectionID' => 'CE101-002', 'courseID' => 'CE101', 'professor' => 15, 'schedule' => json_encode(['days' => ['Mon', 'Wed', 'Fri'], 'startTime' => '10:00', 'endTime' => '11:30', 'room' => 'I102'])],
            ['sectionID' => 'CE101-003', 'courseID' => 'CE101', 'professor' => 14, 'schedule' => json_encode(['days' => ['Tue', 'Thu'], 'startTime' => '15:00', 'endTime' => '16:30', 'room' => 'I103'])],

            ['sectionID' => 'CE102-001', 'courseID' => 'CE102', 'professor' => 16, 'schedule' => json_encode(['days' => ['Mon', 'Wed'], 'startTime' => '08:00', 'endTime' => '09:30', 'room' => 'J101'])],
            ['sectionID' => 'CE102-002', 'courseID' => 'CE102', 'professor' => 16, 'schedule' => json_encode(['days' => ['Tue', 'Thu'], 'startTime' => '10:00', 'endTime' => '11:30', 'room' => 'J102'])],
            ['sectionID' => 'CE102-003', 'courseID' => 'CE102', 'professor' => 17, 'schedule' => json_encode(['days' => ['Mon', 'Wed'], 'startTime' => '13:00', 'endTime' => '14:30', 'room' => 'J103'])],

            ['sectionID' => 'CE103-001', 'courseID' => 'CE103', 'professor' => 15, 'schedule' => json_encode(['days' => ['Mon', 'Wed'], 'startTime' => '13:00', 'endTime' => '14:30', 'room' => 'N101'])],
            ['sectionID' => 'CE103-002', 'courseID' => 'CE103', 'professor' => 17, 'schedule' => json_encode(['days' => ['Tue', 'Thu'], 'startTime' => '08:00', 'endTime' => '09:30', 'room' => 'N102'])],
            ['sectionID' => 'CE103-003', 'courseID' => 'CE103', 'professor' => 17, 'schedule' => json_encode(['days' => ['Mon', 'Wed'], 'startTime' => '10:00', 'endTime' => '11:30', 'room' => 'N103'])],
            // Electrical Engineering Courses Sections
            ['sectionID' => 'EE101-001', 'courseID' => 'EE101', 'professor' => 18, 'schedule' => json_encode(['days' => ['Mon', 'Wed'], 'startTime' => '09:00', 'endTime' => '10:30', 'room' => 'K101'])],
            ['sectionID' => 'EE101-002', 'courseID' => 'EE101', 'professor' => 18, 'schedule' => json_encode(['days' => ['Tue', 'Thu'], 'startTime' => '14:00', 'endTime' => '15:30', 'room' => 'K102'])],
            ['sectionID' => 'EE101-003', 'courseID' => 'EE101', 'professor' => 18, 'schedule' => json_encode(['days' => ['Mon', 'Wed', 'Fri'], 'startTime' => '16:00', 'endTime' => '17:30', 'room' => 'K103'])],

            ['sectionID' => 'EE102-001', 'courseID' => 'EE102', 'professor' => 19, 'schedule' => json_encode(['days' => ['Mon', 'Wed'], 'startTime' => '14:00', 'endTime' => '15:30', 'room' => 'L101'])],
            ['sectionID' => 'EE102-002', 'courseID' => 'EE102', 'professor' => 20, 'schedule' => json_encode(['days' => ['Tue', 'Thu'], 'startTime' => '09:00', 'endTime' => '10:30', 'room' => 'L102'])],
            ['sectionID' => 'EE102-003', 'courseID' => 'EE102', 'professor' => 19, 'schedule' => json_encode(['days' => ['Mon', 'Wed'], 'startTime' => '11:00', 'endTime' => '12:30', 'room' => 'L103'])],

            ['sectionID' => 'EE103-001', 'courseID' => 'EE103', 'professor' => 21, 'schedule' => json_encode(['days' => ['Tue', 'Thu'], 'startTime' => '10:00', 'endTime' => '11:30', 'room' => 'M101'])],
            ['sectionID' => 'EE103-002', 'courseID' => 'EE103', 'professor' => 21, 'schedule' => json_encode(['days' => ['Mon', 'Wed'], 'startTime' => '09:00', 'endTime' => '10:30', 'room' => 'M102'])],
            ['sectionID' => 'EE103-003', 'courseID' => 'EE103', 'professor' => 22, 'schedule' => json_encode(['days' => ['Tue', 'Thu'], 'startTime' => '13:00', 'endTime' => '14:30', 'room' => 'M103'])],


            // Mechanical Engineering Courses Sections
            ['sectionID' => 'ME101-001', 'courseID' => 'ME101', 'professor' => 23, 'schedule' => json_encode(['days' => ['Tue', 'Thu'], 'startTime' => '08:00', 'endTime' => '09:30', 'room' => 'N101'])],
            ['sectionID' => 'ME101-002', 'courseID' => 'ME101', 'professor' => 23, 'schedule' => json_encode(['days' => ['Mon', 'Wed'], 'startTime' => '10:00', 'endTime' => '11:30', 'room' => 'N102'])],
            ['sectionID' => 'ME101-003', 'courseID' => 'ME101', 'professor' => 24, 'schedule' => json_encode(['days' => ['Tue', 'Thu'], 'startTime' => '14:00', 'endTime' => '15:30', 'room' => 'N103'])],

            ['sectionID' => 'ME102-001', 'courseID' => 'ME102', 'professor' => 25, 'schedule' => json_encode(['days' => ['Mon', 'Wed', 'Fri'], 'startTime' => '10:00', 'endTime' => '11:30', 'room' => 'P101'])],
            ['sectionID' => 'ME102-002', 'courseID' => 'ME102', 'professor' => 26, 'schedule' => json_encode(['days' => ['Mon', 'Wed', 'Fri'], 'startTime' => '15:00', 'endTime' => '16:30', 'room' => 'P102'])],
            ['sectionID' => 'ME102-003', 'courseID' => 'ME102', 'professor' => 25, 'schedule' => json_encode(['days' => ['Tue', 'Thu'], 'startTime' => '13:00', 'endTime' => '14:30', 'room' => 'P103'])],

            ['sectionID' => 'ME103-001', 'courseID' => 'ME103', 'professor' => 24, 'schedule' => json_encode(['days' => ['Tue', 'Thu'], 'startTime' => '09:00', 'endTime' => '10:30', 'room' => 'Q101'])],
            ['sectionID' => 'ME103-002', 'courseID' => 'ME103', 'professor' => 26, 'schedule' => json_encode(['days' => ['Mon', 'Wed'], 'startTime' => '10:00', 'endTime' => '11:30', 'room' => 'Q102'])],
            ['sectionID' => 'ME103-003', 'courseID' => 'ME103', 'professor' => 26, 'schedule' => json_encode(['days' => ['Tue', 'Thu'], 'startTime' => '13:00', 'endTime' => '14:30', 'room' => 'Q103'])],
        ]);
    }
}
