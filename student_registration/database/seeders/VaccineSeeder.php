<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VaccineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vaccines')->insertOrIgnore([
            'name' => 'B. C. G. Oral',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('vaccines')->insertOrIgnore([
            'name' => 'Tríplice',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('vaccines')->insertOrIgnore([
            'name' => 'Sabin',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('vaccines')->insertOrIgnore([
            'name' => 'Anti-Tifóide',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('vaccines')->insertOrIgnore([
            'name' => 'Anti-Rubéola',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('vaccines')->insertOrIgnore([
            'name' => 'Anti-Sarampo',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('vaccines')->insertOrIgnore([
            'name' => 'Anti-Tetânica',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('vaccines')->insertOrIgnore([
            'name' => 'B. C. G. Intra Dérmica',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('vaccines')->insertOrIgnore([
            'name' => 'V. A. Y. (Anti-Variólica)',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('vaccines')->insertOrIgnore([
            'name' => 'Outra(s)',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
    }
}
