<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
            'correu' => 'socialgames@gmail.com',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('empresas')->insert([
            'nom' => 'Adderit',
            'adreça' => 'C/Barcelona N3',
            'telefon' => 674592315,
            'correu' => 'adderit@gmail.com',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('empresas')->insert([
            'nom' => 'Gurth',
            'adreça' => 'C/Evans N14',
            'telefon' => 674587313,
            'correu' => 'gurth@gmail.com',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
