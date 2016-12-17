<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProfessorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('professors')->insert([
            [
                'prof_id' => 2,
                'faculty_id' => 1,
                'institute_id' => 2,
                'room' => '101A',
                'visit_hours' => 'Monday whole day and Tuesday between 8 and 11',
                'telephone' => '605784859',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

            [
                'prof_id' => 3,
                'faculty_id' => 1,
                'institute_id' => 7,
                'room' => '103A',
                'visit_hours' => 'Wednesday between 8 and 11',
                'telephone' => '605784850',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

            [
                'prof_id' => 4,
                'faculty_id' => 1,
                'institute_id' => 7,
                'room' => '201B',
                'visit_hours' => 'Thursday and Friday between 8 and 11',
                'telephone' => '605784857',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ]

        ]);

    }
}
