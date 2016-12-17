<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
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
                'role_id' => 1,
                'role' => 'administrator',
            ],

            [
                'role_id' => 2,
                'role' => 'professor',
            ],

            [
                'role_id' => 3,
                'role' => 'student',
            ]
        ]);
    }
}
