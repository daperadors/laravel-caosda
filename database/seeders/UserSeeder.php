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
            'email'=> 'david@carpediem.net',
            'email_verified_at'=> null,
            'password'=> '123456789',
            'coordinator'=> true,
            'group' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users') ->insert([
            'name'=> 'carlos',
            'email'=> 'carlos@carpediem.net',
            'email_verified_at'=> null,
            'password'=> '123456789',
            'coordinator'=> false,
            'group' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users') ->insert([
            'name'=> 'oscar',
            'email'=> 'oscar@carpediem.net',
            'email_verified_at'=> null,
            'password'=> '123456789',
            'coordinator'=> false,
            'group' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
