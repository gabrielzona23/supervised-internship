<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProgramSeeder extends Seeder
{
    const PROGRAMS = [
        'Programa Projetos funcionais',
        'Programa de estimulação',
        'Programa de educação física',
        'Profissional de áreas',
        'Núcleo de apoio a família',
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('programs')->insertOrIgnore([
            'name' => 'Programa Projetos funcionais',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('programs')->insertOrIgnore([
            'name' => 'Programa de estimulação',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('programs')->insertOrIgnore([
            'name' => 'Programa de educação física',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('programs')->insertOrIgnore([
            'name' => 'Profissional de áreas',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('programs')->insertOrIgnore([
            'name' => 'Núcleo de apoio a família',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
