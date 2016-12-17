<?php

use Illuminate\Database\Seeder;

class SpecialisationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specialisations')->insert([
            [
                'specialisation_id' => 1,
                'name' => 'Automatyka i Robotyka' ,
                'faculty_id' => 1,
            ],

            [
                'specialisation_id' => 2,
                'name' => 'Mechatronika' ,
                'faculty_id' => 1,
            ],

            [
                'specialisation_id' => 3,
                'name' => 'Systemy Sterowania Inteligentnymi Budynkami' ,
                'faculty_id' => 1,
            ],

            [
                'specialisation_id' => 4,
                'name' => 'Transport' ,
                'faculty_id' => 1,
            ],

            [
                'specialisation_id' => 5,
                'name' => 'Elektronika i Telekomunikacja' ,
                'faculty_id' => 1,
            ],

            [
                'specialisation_id' => 6,
                'name' => 'Telecommunication and Computer Science (IFE)' ,
                'faculty_id' => 1,
            ],

            [
                'specialisation_id' => 7,
                'name' => 'Elektrotechnika' ,
                'faculty_id' => 1,
            ],

            [
                'specialisation_id' => 8,
                'name' => 'Informatyka' ,
                'faculty_id' => 1,
            ],

            [
                'specialisation_id' => 9,
                'name' => 'Computer Science (IFE)' ,
                'faculty_id' => 1,
            ],

            [
                'specialisation_id' => 10,
                'name' => 'Inżynieria Biomedyczna' ,
                'faculty_id' => 1,
            ]

        ]);
    }
}
