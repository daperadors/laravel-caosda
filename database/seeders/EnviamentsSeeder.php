<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnviamentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('enviaments')->insert([
            'alumne_id' => 1,
            'oferta_id' => 2,
            'observacions' => "No me gustan las observaciones.",
            'estatEnviaments' => 'NoConveni'
        ]);
        DB::table('enviaments')->insert([
            'alumne_id' => 2,
            'oferta_id' => 3,
            'observacions' => "No me gustan las observaciones.",
            'estatEnviaments' => 'Finalitzat i Contractat'
        ]);
        DB::table('enviaments')->insert([
            'alumne_id' => 3,
            'oferta_id' => 2,
            'observacions' => "No me gustan las observaciones.",
            'estatEnviaments' => 'Enviament i retorna la plaça a la oferta'
        ]);
    }
}
