<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('module_questions')->insertOrIgnore([
            'id' => 1,
            'name' => 'Anamnese',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
    }
}
