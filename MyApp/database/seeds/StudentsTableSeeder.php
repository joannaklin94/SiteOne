<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('students')->insert([
            [
                'student_id' => 8,
                'student_number' => 190097,
                'faculty_id' => 1,
                'specialisation_id' => 5,
                'degree' => 'Engineer',
                'thesis_id' => null,
                'telephone' => '605821112',
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

            [
                'student_id' => 9,
                'student_number' => 190098,
                'faculty_id' => 1,
                'specialisation_id' => 4,
                'degree' => 'Engineer',
                'thesis_id' => null,
                'telephone' => '605821992',
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

            [
                'student_id' => 10,
                'student_number' => 190087,
                'faculty_id' => 1,
                'specialisation_id' => 8,
                'degree' => 'Master',
                'thesis_id' => null,
                'telephone' => '605800112',
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ]

        ]);

    }
}
