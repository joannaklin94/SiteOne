<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class StudentstopicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('studentstopics')->insert([
            [
                'id_student' => 5,
                'id_thesis' => 8,
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

            [
                'id' => 6,
                'id_thesis' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

            [
                'id' => 7,
                'id_thesis' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ]

        ]);
    }
}
