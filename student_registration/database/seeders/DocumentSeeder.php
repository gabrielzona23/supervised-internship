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
        DB::table('documents')->insert([
            'name' => 'Histórico Escolar',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('documents')->insert([
            'name' => 'Declaração Escolaridade',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('documents')->insert([
            'name' => 'Carteira de Identidade',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('documents')->insert([
            'name' => 'Declaração',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('documents')->insert([
            'name' => 'Certidão Civil',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('documents')->insert([
            'name' => 'Comprovante de Residência',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('documents')->insert([
            'name' => 'Laudo de NEE',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('documents')->insert([
            'name' => 'Outros',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
    }
}
