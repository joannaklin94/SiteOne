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
                  'id' => 2,
                  'institute' => 'Instytut Automatyki',
                  'room' => '101A',
                  'visit_hours' => 'Monday whole day and Tuesday between 8 and 11',
                  'telephone' => '(+48)605784857',
                  'created_at' => Carbon::now(),
                  'updated_at' => null,
              ],

              [
                  'id' => 3,
                  'institute' => 'Katedra Mikroelektroniki i Technik Informatycznych',
                  'room' => '103A',
                  'visit_hours' => 'Wednesday between 8 and 11',
                  'telephone' => '(+48)605784857',
                  'created_at' => Carbon::now(),
                  'updated_at' => null,
              ],

              [
                  'id' => 4,
                  'institute' => 'Katedra Mikroelektroniki i Technik Informatycznych',
                  'room' => '201B',
                  'visit_hours' => 'Thursday and Friday between 8 and 11',
                  'telephone' => '(+48)605784857',
                  'created_at' => Carbon::now(),
                  'updated_at' => null,
              ]

          ]);

    }
}
