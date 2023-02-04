<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlumnesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alumnes')->insert([
            'nom'=>'Carlos',
            'cognoms'=> 'Alises Mora',
            'dni'=> '46321260Q',
            'curs' => '2022-2023',
            'telefon' => 674561243,
            'correu' => 'calisesm@gmail.com',
            'idEstudi' => 1,
            //'idTutor' => 2,
            'practiques' => true,
            'cv' => '#CV.pdf',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('alumnes')->insert([
            'nom'=>'David',
            'cognoms'=> 'Aperador Salcedo',
            'dni'=> '56121268P',
            'curs' => '2022-2023',
            'telefon' => 672563241,
            'correu' => 'daperadors@gmail.com',
            'idEstudi' => 2,
            //'idTutor' => 1,
            'practiques' => true,
            'cv' => '#CV.pdf',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('alumnes')->insert([
            'nom'=>'Oscar',
            'cognoms'=> 'Troya Castilla',
            'dni'=> '49151267B',
            'curs' => '2022-2023',
            'telefon' => 677761221,
            'correu' => 'otroya@gmail.com',
            'idEstudi' => 1,
            //'idTutor' => 2,
            'practiques' => true,
            'cv' => '#CV.pdf',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
