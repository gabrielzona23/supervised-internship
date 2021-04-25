<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('documents')->insertOrIgnore([
            'name' => 'Histórico Escolar',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('documents')->insertOrIgnore([
            'name' => 'Declaração Escolaridade',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('documents')->insertOrIgnore([
            'name' => 'Carteira de Identidade',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('documents')->insertOrIgnore([
            'name' => 'Declaração',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('documents')->insertOrIgnore([
            'name' => 'Certidão Civil',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('documents')->insertOrIgnore([
            'name' => 'Comprovante de Residência',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('documents')->insertOrIgnore([
            'name' => 'Laudo de NEE',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('documents')->insertOrIgnore([
            'name' => 'Outros',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
    }
}
