<?php

namespace Database\Seeders;

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
            'idCicle'=> 1,
            'numVacants'=> 1,
            'curs'=> '2022-2023',
            'nomContacte' => 'Miquel',
            'cognomContacte' => 'Sitges',
            'correuContacte' => 'oferta@gmail.com'
        ]);
        DB::table('ofertas') ->insert([
            'idEmpresa'=> 1,
            'descripcio'=> 'Javascript Developer',
            'idCicle'=> 3,
            'numVacants'=> 2,
            'curs'=> '2022-2023',
            'nomContacte' => 'Juan',
            'cognomContacte' => 'Fernandez',
            'correuContacte' => 'oferta@gmail.com'
        ]);
        DB::table('ofertas') ->insert([
            'idEmpresa'=> 3,
            'descripcio'=> 'Backend Larabel',
            'idCicle'=> 2,
            'numVacants'=> 3,
            'curs'=> '2022-2023',
            'nomContacte' => 'Susana',
            'cognomContacte' => 'Lopez',
            'correuContacte' => 'oferta@gmail.com'
        ]);
    }
}
