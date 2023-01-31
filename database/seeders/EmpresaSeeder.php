<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empresas')->insert([
            'nom' => 'Social Games',
            'adreça' => 'C/Sena N8',
            'telefon' => 674562310,
            'correu' => 'socialgames@gmail.com'
        ]);
        DB::table('empresas')->insert([
            'nom' => 'Adherit',
            'adreça' => 'C/Barcelona N3',
            'telefon' => 674592315,
            'correu' => 'adherit@gmail.com'
        ]);
        DB::table('empresas')->insert([
            'nom' => 'Gurth',
            'adreça' => 'C/Evans N14',
            'telefon' => 674587313,
            'correu' => 'adherit@gmail.com'
        ]);
    }
}
