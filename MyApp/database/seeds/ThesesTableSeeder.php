<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ThesesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('theses')->insert([
            [
                'id' => 1,
                'id_prof' => 4,
                'title_pol' => 'Przegląd standardów infromatycznych stosowanych w systemach telemechaniki stacji elektroenergetycznych',
                'title_ang' => 'A review of ICT standards used in primary and secondary substations',
                'description_pol' => null,
                'description_ang' => null,
                'degree' => 'Master',
                'faculties' => 1,
                'specialisations'=> '1;5;6',
                'is_chosen'=> 'not_chosen',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

            [
                'id' => 2,
                'id_prof' => 3,
                'title_pol' => 'Aplety Java - użycie i znaczenie',
                'title_ang' => 'Java applets - usage and importance',
                'description_pol' => null,
                'description_ang' => null,
                'degree' => 'Engineer',
                'faculties' => 1,
                'specialisations'=> '1;5;6;8;9',
                'is_chosen'=> 'not_chosen',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

            [
                'id' => 3,
                'id_prof' => 3,
                'title_pol' => 'Aplikacja internetowa napisana w Java 8',
                'title_ang' => 'Internet application written in Java 8',
                'description_pol' => null,
                'description_ang' => null,
                'degree' => 'Engineer',
                'faculties' => 1,
                'specialisations'=> '5;6;8;9',
                'is_chosen'=> 'not_chosen',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

            [
                'id' => 4,
                'id_prof' => 2,
                'title_pol' => 'Porównanie szablonów CSS',
                'title_ang' => 'Comparison of CSS frameworks',
                'description_pol' => null,
                'description_ang' => null,
                'degree' => 'Engineer',
                'faculties' => 1,
                'specialisations'=> '5;6;8;9',
                'is_chosen'=> 'not_chosen',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

            [
                'id' => 5,
                'id_prof' => 2,
                'title_pol' => 'Optymalizacja transportu publicznego w Łodzi',
                'title_ang' => 'Optimisation of public transport system in Lodz',
                'description_pol' => null,
                'description_ang' => null,
                'degree' => 'Engineer',
                'faculties' => 1,
                'specialisations'=> '4',
                'is_chosen'=> 'not_chosen',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

            [
                'id' => 6,
                'id_prof' => 4,
                'title_pol' => 'Program rozpoznający komponenty elektroniczne',
                'title_ang' => 'Computer aided system of electrical devices recognition',
                'description_pol' => null,
                'description_ang' => null,
                'degree' => 'Master',
                'faculties' => 1,
                'specialisations'=> '1;5;6',
                'is_chosen'=> 'not_chosen',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

            [
                'id' => 7,
                'id_prof' => 4,
                'title_pol' => 'Światłowowdy - klasyfikacja oraz obserwacje',
                'title_ang' => 'Optical fibers - classification and observations',
                'description_pol' => null,
                'description_ang' => null,
                'degree' => 'Engineer',
                'faculties' => 1,
                'specialisations'=> '5;6',
                'is_chosen'=> 'not_chosen',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

            [
                'id' => 8,
                'id_prof' => 2,
                'title_pol' => 'Programy komputerowe do śledzenia przepływu energii',
                'title_ang' => 'Computer modelling of power flow tracing',
                'description_pol' => null,
                'description_ang' => null,
                'degree' => 'Master',
                'faculties' => 1,
                'specialisations'=> '1;5;6;8;9',
                'is_chosen'=> 'not_chosen',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

            [
                'id' => 9,
                'id_prof' => 2,
                'title_pol' => 'E-platforma do rezerwacji sall przez profesorów TUL',
                'title_ang' => 'E-platform managing class reservations for professors of TUL',
                'description_pol' => null,
                'description_ang' => null,
                'degree' => 'Engineer',
                'faculties' => 1,
                'specialisations'=> '1;5;6;8;9',
                'is_chosen'=> 'not_chosen',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

            [
                'id' => 10,
                'id_prof' => 4,
                'title_pol' => 'Elastyczne źródła photowoltaiczne',
                'title_ang' => 'Elastic photovoltaic sources',
                'description_pol' => null,
                'description_ang' => null,
                'degree' => 'Master',
                'faculties' => 1,
                'specialisations'=> '1;4;5;6',
                'is_chosen'=> 'not_chosen',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

            [
                'id' => 11,
                'id_prof' => 5,
                'title_pol' => 'Baza danych pojazdów elekrycznych dostępnych na rynku Europejskim',
                'title_ang' => 'Database of electrical vehicles on European market',
                'description_pol' => null,
                'description_ang' => null,
                'degree' => 'Engineer',
                'faculties' => 1,
                'specialisations'=> '1;5;6',
                'is_chosen'=> 'not_chosen',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

            [
                'id' => 12,
                'id_prof' => 5,
				'title_pol' => 'Strona internetowa konferencji naukowej',
                'title_ang' => 'Scientific Conference website',
                'description_pol' => null,
				'description_ang' => null,
                'degree' => 'Master',
				'faculties' => 1,
                'specialisations'=> '1;5;6;8;9',
                'is_chosen'=> 'not_chosen',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

            [
                'id' => 13,
                'id_prof' => 6,
                'title_pol' => 'Sterowanie silnikami synchronicznymi w kolejach dużych prędkości',
				'title_ang' => 'Synchronous motor control in high-speed railways',
                'description_pol' => null,
				'description_ang' => null,
                'degree' => 'Master',
				'faculties' => 1,
                'specialisations'=> '1;5;6;7;8',
                'is_chosen'=> 'not_chosen',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

			[
                'id' => 14,
                'id_prof' => 6,
				'title_pol' => 'Diagnostyka eksploatacyjna pociągu metra',
				'title_ang' => 'Subway train exploitation diagnostics',
                'description_pol' => null,
				'description_ang' => null,
                'degree' => 'Engineer',
				'faculties' => 1,
                'specialisations'=> '1;5;6',
                'is_chosen'=> 'not_chosen',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

			[
                'id' => 15,
                'id_prof' => 7,
				'title_pol' => 'Badanie filtrów przeciwzakłóceniowych',
                'title_ang' => 'Electromagnetic interference (EMI) filters testing',
                'description_pol' => null,
				'description_ang' => null,
                'degree' => 'Engineer',
				'faculties' => 1,
                'specialisations'=> '1;2;3;5;6',
                'is_chosen'=> 'not_chosen',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

			[
                'id' => 16,
                'id_prof' => 7,
				'title_pol' => 'Obliczenia impedancji linii napowietrznych i kablowych',
				'title_ang' => 'Impedance calculation of overhead and cable lines',
                'description_pol' => null,
				'description_ang' => null,
                'degree' => 'Master',
				'faculties' => 1,
                'specialisations'=> '1;2;3;5;6;7',
                'is_chosen'=> 'not_chosen',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ]

        ]);
    }
}
