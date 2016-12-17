<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Admin',
                'surname' => 'Adminowski',
                'avatar' => 'default.png',
                'role_id' => 1,
                'email' => 'admin@gmail.com',
                'password' => bcrypt('Haslo1'),
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

            [
                'id' => 2,
                'name' => 'Rafal',
                'surname' => 'Zawislak',
                'avatar' => 'default.png',
                'role_id' => 2,
                'email' => 'rafal@gmail.com',
                'password' => bcrypt('Haslo1'),
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

            [
                'id' => 3,
                'name' => 'Grzegorz',
                'surname' => 'Jablonski',
                'avatar' => 'default.png',
                'role_id' => 2,
                'email' => 'gwj@gmail.com',
                'password' => bcrypt('Haslo1'),
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

            [
                'id' => 4,
                'name' => 'Marcin',
                'surname' => 'Janicki',
                'avatar' => 'default.png',
                'role_id' => 2,
                'email' => 'marcin@gmail.com',
                'password' => bcrypt('Haslo1'),
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

            [
                'id' => 5,
                'name' => 'Lidia',
                'surname' => 'Jackowska-Strumiłło',
                'avatar' => 'default.png',
                'role_id' => 2,
                'email' => 'lidia@gmail.com',
                'password' => bcrypt('Haslo1'),
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

            [
                'id' => 6,
                'name' => 'Andrzej',
                'surname' => 'Napieralski',
                'avatar' => 'default.png',
                'role_id' => 2,
                'email' => 'andrzej@gmail.com',
                'password' => bcrypt('Haslo1'),
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

            [
                'id' => 7,
                'name' => 'Łukasz',
                'surname' => 'Starzak',
                'avatar' => 'default.png',
                'role_id' => 2,
                'email' => 'lukasz@gmail.com',
                'password' => bcrypt('Haslo1'),
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

            [
                'id' => 8,
                'name' => 'Joanna',
                'surname' => 'Klinkiewicz',
                'avatar' => 'default.png',
                'role_id' => 3,
                'email' => 'joanna@gmail.com',
                'password' => bcrypt('Haslo1'),
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

            [
                'id' => 9,
                'name' => 'Kacper',
                'surname' => 'Pacek',
                'avatar' => 'default.png',
                'role_id' => 3,
                'email' => 'kacper@gmail.com',
                'password' => bcrypt('Haslo1'),
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

            [
                'id' => 10,
                'name' => 'Maciej',
                'surname' => 'Karbowski',
                'avatar' => 'default.png',
                'role_id' => 3,
                'email' => 'maciej@gmail.com',
                'password' => bcrypt('Haslo1'),
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

            [
                'id' => 11,
                'name' => 'Pawel',
                'surname' => 'Gomulak',
                'avatar' => 'default.png',
                'role_id' => 3,
                'email' => 'pawel@gmail.com',
                'password' => bcrypt('Haslo1'),
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

            [
                'id' => 12,
                'name' => 'Magda',
                'surname' => 'Buczek',
                'avatar' => 'default.png',
                'role_id' => 3,
                'email' => 'magda@gmail.com',
                'password' => bcrypt('Haslo1'),
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ]


        ]);





    }
}
