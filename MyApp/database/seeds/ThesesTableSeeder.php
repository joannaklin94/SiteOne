<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ThesesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('theses')->insert([
            [
                'id' => 1,
                'id_prof' => 4,
                'title' => 'Problems of Numerical Calculation of Fractional Orders',
                'description' => null,
                'degree' => 'Master',
                'specialisations'=> 'Telecommunication and Computer Science (IFE);Automatyka i Robotyka',
                'status'=> 'not_chosen',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

            [
                'id' => 2,
                'id_prof' => 3,
                'title' => 'Java applets - usage and importance',
                'description' => null,
                'degree' => 'Engineer',
                'specialisations'=> 'Telecommunication and Computer Science (IFE);Informatyka;Computer Science (IFE);Elektronika i Telekomunikacja; Automatyka i Robotyka',
                'status'=> 'not_chosen',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

            [
                'id' => 3,
                'id_prof' => 3,
                'title' => 'Internet application written in Java 8',
                'description' => null,
                'degree' => 'Engineer',
                'specialisations'=> 'Telecommunication and Computer Science (IFE);Informatyka;Computer Science (IFE); Elektronika i Telekomunikacja',
                'status'=> 'not_chosen',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

            [
                'id' => 4,
                'id_prof' => 2,
                'title' => 'Comparison of CSS frameworks',
                'description' => null,
                'degree' => 'Engineer',
                'specialisations'=> 'Telecommunication and Computer Science (IFE);Informatyka;Computer Science (IFE); Elektronika i Telekomunikacja; Automatyka i Robotyka',
                'status'=> 'not_chosen',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

            [
                'id' => 5,
                'id_prof' => 2,
                'title' => 'Optimisation of public transport system in Lodz',
                'description' => null,
                'degree' => 'Engineer',
                'specialisations'=> 'Transport',
                'status'=> 'not_chosen',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

            [
                'id' => 6,
                'id_prof' => 4,
                'title' => 'Computer aided system of electrical devices recognition',
                'description' => null,
                'degree' => 'Master',
                'specialisations'=> 'Telecommunication and Computer Science (IFE);Elektronika i Telekomunikacja;Automatyka i Robotyka',
                'status'=> 'not_chosen',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

            [
                'id' => 7,
                'id_prof' => 4,
                'title' => 'Optical fibers - classification and observations',
                'description' => null,
                'degree' => 'Engineer',
                'specialisations'=> 'Telecommunication and Computer Science (IFE);Elektronika i Telekomunikacja;',
                'status'=> 'not_chosen',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

            [
                'id' => 8,
                'id_prof' => 2,
                'title' => 'School database optimisation and normalisation',
                'description' => null,
                'degree' => 'Engineer',
                'specialisations'=> 'Telecommunication and Computer Science (IFE);Informatyka;Computer Science (IFE); Elektronika i Telekomunikacja; Automatyka i Robotyka',
                'status'=> 'not_chosen',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

            [
                'id' => 9,
                'id_prof' => 2,
                'title' => 'E-platform managing class reservations for professors of TUL',
                'description' => null,
                'degree' => 'Engineer',
                'specialisations'=> 'Telecommunication and Computer Science (IFE);Informatyka;Computer Science (IFE); Elektronika i Telekomunikacja; Automatyka i Robotyka',
                'status'=> 'not_chosen',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

            [
                'id' => 10,
                'id_prof' => 4,
                'title' => 'Elastic photovoltaic sources',
                'description' => null,
                'degree' => 'Master',
                'specialisations'=> 'Telecommunication and Computer Science (IFE);Elektronika i Telekomunikacja; Automatyka i Robotyka',
                'status'=> 'not_chosen',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ]

        ]);
    }
}
