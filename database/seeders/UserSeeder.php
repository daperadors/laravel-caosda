<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users') ->insert([
            'name'=> 'david',
            'email'=> 'david@caosda.es',
            'email_verified_at'=> null,
            'password'=> '123456789',
            'coordinador'=> true,
            'grup_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users') ->insert([
            'name'=> 'carlos',
            'email'=> 'carlos@caosda.es',
            'email_verified_at'=> null,
            'password'=> '123456789',
            'coordinador'=> false,
            'grup_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users') ->insert([
            'name'=> 'oscar',
            'email'=> 'oscar@caosda.es',
            'email_verified_at'=> null,
            'password'=> '123456789',
            'coordinador'=> false,
            'grup_id' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
