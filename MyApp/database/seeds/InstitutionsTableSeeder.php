<?php

use Illuminate\Database\Seeder;

class InstitutionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('institutes')->insert([
            [
                'institute_id' => 1,
                'name_pol' => 'Instytut Systemow Inzynierii Elektrycznej',
                'name_eng' => null,
                'faculty_id' => 1,
            ],

            [
                'institute_id' => 2,
                'name_pol' => 'Instytut Automatyki',
                'name_eng' => null,
                'faculty_id' => 1,
            ],

            [
                'institute_id' => 3,
                'name_pol' => 'Instytut Mechatroniki i Systemow Informatycznych',
                'name_eng' => null,
                'faculty_id' => 1,
            ],

            [
                'institute_id' => 4,
                'name_pol' => 'Instytut Elektroenergetyki',
                'name_eng' => null,
                'faculty_id' => 1,
            ],

            [
                'institute_id' => 5,
                'name_pol' => 'Instytut Elektroniki',
                'name_eng' => null,
                'faculty_id' => 1,
            ],

            [
                'institute_id' => 6,
                'name_pol' => 'Instytut Informatyki Stosowanej',
                'name_eng' => null,
                'faculty_id' => 1,
            ],

            [
                'institute_id' => 7,
                'name_pol' => 'Katedra Mikroelektroniki i Technik Informatycznych',
                'name_eng' => null,
                'faculty_id' => 1,
            ],

            [
                'institute_id' => 8,
                'name_pol' => 'Katedra aparatow Elektrycznych',
                'name_eng' => null,
                'faculty_id' => 1,
            ],

            [
                'institute_id' => 9,
                'name_pol' => 'Katedra Przyrzadow Polprzewodnikowych i Optoelektronicznych',
                'name_eng' => null,
                'faculty_id' => 1,
            ]
        ]);
    }
}
