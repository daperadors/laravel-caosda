<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfertasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('ofertas') ->insert([
            'idEmpresa'=> 2,
            'descripcio'=> 'FrontEnd Unity',
            'idEstudi'=> 1,
            'numVacants'=> 1,
            'curs'=> '2022-2023',
            'nomContacte' => 'Miquel',
            'cognomContacte' => 'Sitges',
            'correuContacte' => 'oferta@gmail.com',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('ofertas') ->insert([
            'idEmpresa'=> 1,
            'descripcio'=> 'Javascript Developer',
            'idEstudi'=> 3,
            'numVacants'=> 2,
            'curs'=> '2022-2023',
            'nomContacte' => 'Juan',
            'cognomContacte' => 'Fernandez',
            'correuContacte' => 'oferta2@gmail.com',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('ofertas') ->insert([
            'idEmpresa'=> 3,
            'descripcio'=> 'Backend Laravel',
            'idEstudi'=> 2,
            'numVacants'=> 3,
            'curs'=> '2022-2023',
            'nomContacte' => 'Susana',
            'cognomContacte' => 'Lopez',
            'correuContacte' => 'oferta3@gmail.com',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
