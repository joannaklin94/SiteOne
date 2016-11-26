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
//        $this->call(StudentsTableSeeder::class);
//        $this->call(ProfessorsTableSeeder::class);
//        $this->call(ThesesTableSeeder::class);
//        $this->call(UsersTableSeeder::class);
//        $this->call(AdsTableSeeder::class);
//        $this->call(StudentstopicTableSeeder::class);
        $this->call(CommentsTableSeeder::class);

    }
}

