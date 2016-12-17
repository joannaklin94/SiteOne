<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AdsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ads')->insert([
            [
                'id' => 1,
                'id_prof' => 2,
                'title' => 'No meeting on Monday',
                'description' => 'Due to my work presentation in London, I am not available on Monday 15.11.2016',
                'id_student' => null,
        'finish_date' => '2016-12-15',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

            [
                'id' => 2,
                'id_prof' => 3,
                'title' => 'No meeting on Tuesday',
                'description' => 'Due to my work presentation in Warsaw, I am not available on Monday 15.11.2016',
                'id_student' => null,
                'finish_date' => '2016-11-15',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

            [
                'id' => 3,
                'id_prof' => 4,
                'title' => 'No meeting on Friday',
                'description' => 'Due to my work presentation in Berlin, I am not available on Monday 15.11.2016',
                'id_student' => null,
                'finish_date' => '2016-12-15',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

            [
                'id' => 4,
                'id_prof' => 2,
                'title' => 'Sick leave 13.11 - 23.11',
                'description' => 'Due to my sickness, I am not available until Monday 23.11.2016',
                'id_student' => null,
                'finish_date' => '2016-12-15',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

            [
                'id' => 5,
                'id_prof' => 2,
                'title' => 'Sick leave 13.11 - 25.11',
                'description' => 'Due to my sickness, I am not available until Monday 23.11.2016',
                'id_student' => null,
                'finish_date' => '2016-12-12',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

        ]);
    }
}
