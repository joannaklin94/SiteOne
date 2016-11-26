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
                'id' => 1,
                'specialisation' => 'Automatyka i Robotyka' ,
            ],

            [
                'id' => 2,
                'specialisation' => 'Mechatronika' ,
            ],

            [
                'id' => 3,
                'specialisation' => 'Systemy Sterowania Inteligentnymi Budynkami' ,
            ],

            [
                'id' => 4,
                'specialisation' => 'Transport' ,
            ],

            [
                'id' => 5,
                'specialisation' => 'Elektronika i Telekomunikacja' ,
            ],

            [
                'id' => 6,
                'specialisation' => 'Telecommunication and Computer Science (IFE)' ,
            ],

            [
                'id' => 7,
                'specialisation' => 'Elektrotechnika' ,
            ],

            [
                'id' => 8,
                'specialisation' => 'Informatyka' ,
            ],

            [
                'id' => 9,
                'specialisation' => 'Computer Science (IFE)' ,
            ],

            [
                'id' => 10,
                'specialisation' => 'Inżynieria Biomedyczna' ,
            ]

        ]);
    }
}
