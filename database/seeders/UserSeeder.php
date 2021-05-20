<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
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
        DB::table('users')->insertOrIgnore([
            'name' => 'Zonatto',
            'email' => 'gabriel.zonatto@hotmail.com',
            'nickname' => 'zonattin',
            'status' => 'active',
            'email_verified_at' => now(),
            'password' => bcrypt('bunitindaquebrada'), // password
            'remember_token' => Str::random(10),
        ]);
        DB::table('users')->insertOrIgnore([
            'name' => 'Natália',
            'email' => 'natalia.freire@gmail.com',
            'nickname' => 'Natália',
            'status' => 'active',
            'email_verified_at' => now(),
            'password' => bcrypt('k8dzJh$7W$Yt'), // password
            'remember_token' => Str::random(10),
        ]);
        DB::table('users')->insertOrIgnore([
            'name' => 'Secretaria1',
            'email' => 'secretaria1@gmail.com',
            'nickname' => 'sec1',
            'status' => 'active',
            'email_verified_at' => now(),
            'password' => bcrypt('BBaq#yqcsMIJ'), // password
            'remember_token' => Str::random(10),
        ]);
        DB::table('users')->insertOrIgnore([
            'name' => 'Secretaria2',
            'email' => 'Secretaria2@hotmail.com',
            'nickname' => 'sec2',
            'status' => 'active',
            'email_verified_at' => now(),
            'password' => bcrypt('9%ScPr2dz2XB'), // password
            'remember_token' => Str::random(10),
        ]);
        DB::table('users')->insertOrIgnore([
            'name' => 'Secretaria3',
            'email' => 'Secretaria3@gmail.com',
            'nickname' => 'sec3',
            'status' => 'active',
            'email_verified_at' => now(),
            'password' => bcrypt('qpRxt@Nx0l%M'), // password
            'remember_token' => Str::random(10),
        ]);
    }
}
