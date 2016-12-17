<?php

use Illuminate\Database\Seeder;

class FacultiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faculties')->insert([
            [
                'faculty_id' => 1,
                'faculty_pol' => 'EEIA',
                'faculty_ang' => null,
            ],

            [
                'faculty_id' => 2,
                'faculty_pol' => 'BINOŻ',
                'faculty_ang' => null,
            ],

            [
                'faculty_id' => 3,
                'faculty_pol' => 'BAIŚ',
                'faculty_ang' => null,
            ],

            [
                'faculty_id' => 4,
                'faculty_pol' => 'OIZ',
                'faculty_ang' => null,
            ],

            [
                'faculty_id' => 5,
                'faculty_pol' => 'IFE',
                'faculty_ang' => null,
            ]
        ]);
    }
}
