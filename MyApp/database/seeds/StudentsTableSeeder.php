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
                'id' => 5,
                'student_number' => 190097,
                'specialisation' => 'Telecommunication and Computer Science (IFE)',
                'degree' => 'Engineer',
                'telephone' => '(+48)605821112',
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

            [
                'id' => 6,
                'student_number' => 190098,
                'specialisation' => 'Transport',
                'degree' => 'Engineer',
                'telephone' => '(+48)605821992',
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

            [
                'id' => 7,
                'student_number' => 190087,
                'specialisation' => 'Informatyka',
                'degree' => 'Master',
                'telephone' => '(+48)605800112',
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ]

        ]);

    }
}
