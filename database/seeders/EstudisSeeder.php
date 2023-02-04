<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
           'nom' => 'DAMVI',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('estudis')->insert([
            'nom' => 'SMX',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('estudis')->insert([
            'nom' => 'ASIX',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('estudis')->insert([
            'nom' => 'DAM',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
