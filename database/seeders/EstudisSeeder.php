<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstudisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estudis')->insert([
           'nom' => 'DAMVI'
        ]);
        DB::table('estudis')->insert([
            'nom' => 'SMX'
        ]);
        DB::table('estudis')->insert([
            'nom' => 'ASIX'
        ]);
    }
}
