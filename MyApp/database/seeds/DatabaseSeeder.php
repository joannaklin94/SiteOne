<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'asia',
            'password' => bcrypt('secret1'),
        ]);

        DB::table('users')->insert([
            'id' => 2,
            'name' => 'kasia',
            'password' => bcrypt('secret2'),
        ]);

        DB::table('users')->insert([
            'id' => 3,
            'name' => 'basia',
            'password' => bcrypt('secret3'),
        ]);

        DB::table('studentsExercise')->insert([
            'id' => 1,
            'name' => 'Basia',
            'surname' => 'Nowak',
            'specialisation' => 'TCS',
        ]);

        DB::table('studentsExercise')->insert([
            'id' => 2,
            'name' => 'Kasia',
            'surname' => 'Maslak',
            'specialisation' => 'CS',
        ]);

        DB::table('studentsExercise')->insert([
            'id' => 3,
            'name' => 'Asia',
            'surname' => 'Pacek',
            'specialisation' => 'TCS',
        ]);
    }
}

