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
//        if(DB::table('users')->get()->count() == 0)

            DB::table('users')->insert([
                [
                    'id' => 1,
                    'name' => 'Admin',
                    'surname' => 'Adminowski',
                    'avatar' => 'default.png',
                    'role' => 'admin',
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
                    'role' => 'prof',
                    'email' => 'rafal@gmail.com',
                    'password' => bcrypt('Haslo1'),
                    'created_at' => Carbon::now(),
                    'updated_at' => null,
                ],

              [
                  'id' => 3,
                  'name' => 'GWJ',
                  'surname' => 'Jablonski',
                  'avatar' => 'default.png',
                  'role' => 'prof',
                  'email' => 'gwj@gmail.com',
                  'password' => bcrypt('Haslo1'),
                  'created_at' => Carbon::now(),
                  'updated_at' => null,
              ],

              [
              'id' => 4,
                    'name' => 'Jan',
                    'surname' => 'Janicki',
                    'avatar' => 'default.png',
                    'role' => 'prof',
                    'email' => 'jan@gmail.com',
                    'password' => bcrypt('Haslo1'),
                    'created_at' => Carbon::now(),
                    'updated_at' => null,
                ],

              [
                  'id' => 5,
                  'name' => 'Joanna',
                  'surname' => 'Klinkiewicz',
                  'avatar' => 'default.png',
                  'role' => 'student',
                  'email' => 'joanna@gmail.com',
                  'password' => bcrypt('Haslo1'),
                  'created_at' => Carbon::now(),
                  'updated_at' => null,
              ],

                [
                    'id' => 6,
                    'name' => 'Kacper',
                    'surname' => 'Pacek',
                    'avatar' => 'default.png',
                    'role' => 'student',
                    'email' => 'kacper@gmail.com',
                    'password' => bcrypt('Haslo1'),
                    'created_at' => Carbon::now(),
                    'updated_at' => null,
                ],

                [
                'id' => 7,
                  'name' => 'Owca',
                  'surname' => 'Karbowski',
                  'avatar' => 'default.png',
                  'role' => 'student',
                  'email' => 'owca@gmail.com',
                  'password' => bcrypt('Haslo1'),
                  'created_at' => Carbon::now(),
                  'updated_at' => null,
              ],

          [
              'id' => 8,
              'name' => 'Pawel',
              'surname' => 'Gomulak',
              'avatar' => 'default.png',
              'role' => 'student',
              'email' => 'pawel@gmail.com',
              'password' => bcrypt('Haslo1'),
              'created_at' => Carbon::now(),
              'updated_at' => null,
          ],

          [
          'id' => 9,
                  'name' => 'Magda',
                  'surname' => 'Buczek',
                  'avatar' => 'default.png',
                  'role' => 'student',
                  'email' => 'magda@gmail.com',
                  'password' => bcrypt('Haslo1'),
                  'created_at' => Carbon::now(),
                  'updated_at' => null,
              ]


            ]);





    }
}
