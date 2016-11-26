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
        DB::table('roles')->insert([
            [
                'id' => 1,
                'institute' => 'Instytut Systemow Inzynierii Elektrycznej',
            ],

            [
                'id' => 2,
                'institute' => 'Instytut Automatyki',
            ],

            [
                'id' => 3,
              'institute' => 'Instytut Mechatroniki i Systemow Informatycznych',
            ],

            [
                'id' => 4,
                'institute' => 'Instytut Elektroenergetyki',
            ],

            [
                'id' => 5,
                'institute' => 'Instytut Elektroniki',
            ],

            [
                'id' => 6,
                'institute' => 'Instytut Informatyki Stosowanej',
            ],

            [
                'id' => 7,
                'institute' => 'Katedra Mikroelektroniki i Technik Informatycznych',
            ],

            [
                'id' => 8,
                'institute' => 'Katedra aparatow Elektrycznych',
            ],
            [
                'id' => 9,
                'institute' => 'Katedra Przyrzadow Polprzewodnikowych i Optoelektronicznych',
            ]
        ]);
    }
}
