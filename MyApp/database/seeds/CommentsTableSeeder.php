<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            [
                'user_id' => 2,
                'message' => 'Good job',
                'id_student' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

            [
                'user_id' => 2,
                'message' => 'Bad job',
                'id_student' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

            [
                'user_id' => 2,
                'message' => 'I am confused...',
                'id_student' => 7,
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

            [
                'user_id' => 5,
                'message' => 'I am confused...',
                'id_student' => null,
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

        [
                'user_id' => 3,
                'message' => 'Hmmm...',
                'id_student' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => null,
        ],


        [
            'user_id' => 8,
            'message' => 'What?',
            'id_student' => null,
            'created_at' => Carbon::now(),
            'updated_at' => null,
        ],

        [
            'user_id' => 8,
            'message' => 'I think I now what to do now',
            'id_student' => null,
            'created_at' => Carbon::now(),
            'updated_at' => null,
        ],

        [
            'user_id' => 2,
            'message' => 'Hmmm nope...',
            'id_student' => 8,
            'created_at' => Carbon::now(),
            'updated_at' => null,
        ],

        [
                'user_id' => 5,
                'message' => 'Hmmm...yeah',
                'id_student' => null,
                'created_at' => Carbon::now(),
                'updated_at' => null,
        ]

        ]);

    }
}
