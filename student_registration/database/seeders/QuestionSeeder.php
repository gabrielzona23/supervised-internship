<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert([
            'description' => 'Ordem de nascimento?',
            'type' => 'textual',
            'module_question_id' => '1',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('questions')->insert([
            'description' => 'Tipo de parto?',
            'type' => 'trueFalse',
            'module_question_id' => '1',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('questions')->insert([
            'description' => 'Teve algum problema ao nascer?',
            'type' => 'trueFalse',
            'module_question_id' => '1',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('questions')->insert([
            'description' => 'Qual problema teve ao nascer?',
            'type' => 'textual',
            'module_question_id' => '1',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('questions')->insert([
            'description' => 'Tem problemas de alergia?',
            'type' => 'trueFalse',
            'module_question_id' => '1',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('questions')->insert([
            'description' => 'A que tem alergia?',
            'type' => 'textual',
            'module_question_id' => '1',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('questions')->insert([
            'description' => 'Faz uso de algum medicamento continuamente?',
            'type' => 'trueFalse',
            'module_question_id' => '1',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('questions')->insert([
            'description' => 'Qual o medicamento usada continuamente?',
            'type' => 'textual',
            'module_question_id' => '1',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('questions')->insert([
            'description' => 'Doenças adquiridas desde o nascimento e a idade?',
            'type' => 'textual',
            'module_question_id' => '1',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('questions')->insert([
            'description' => 'Já fez alguma cirurgia?',
            'type' => 'trueFalse',
            'module_question_id' => '1',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('questions')->insert([
            'description' => 'Qual cirurgia já fez?',
            'type' => 'textual',
            'module_question_id' => '1',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('questions')->insert([
            'description' => 'Tem alguma cicatriz ou marca no corpo?',
            'type' => 'trueFalse',
            'module_question_id' => '1',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('questions')->insert([
            'description' => 'Em qual parte do corpo tem alguma cicatriz ou marca?',
            'type' => 'textual',
            'module_question_id' => '1',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('questions')->insert([
            'description' => 'Tomou leite materno?',
            'type' => 'trueFalse',
            'module_question_id' => '1',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('questions')->insert([
            'description' => 'Em qual período tomou leite materno?',
            'type' => 'textual',
            'module_question_id' => '1',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('questions')->insert([
            'description' => 'Introduziu outro leite com qual idade?',
            'type' => 'textual',
            'module_question_id' => '1',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('questions')->insert([
            'description' => 'Qual leite/engrossante foi introduzido?',
            'type' => 'textual',
            'module_question_id' => '1',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('questions')->insert([
            'description' => 'Atualmente toma mamadeira?',
            'type' => 'trueFalse',
            'module_question_id' => '1',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('questions')->insert([
            'description' => 'Toma mamadeira com qual engrossante?',
            'type' => 'textual',
            'module_question_id' => '1',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('questions')->insert([
            'description' => 'Introduziu papinha de frutas com qual idade?',
            'type' => 'textual',
            'module_question_id' => '1',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('questions')->insert([
            'description' => 'Introduziu sopinha com qual idade?',
            'type' => 'textual',
            'module_question_id' => '1',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('questions')->insert([
            'description' => 'Introduziu alimento normal da família com qual idade?',
            'type' => 'textual',
            'module_question_id' => '1',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('questions')->insert([
            'description' => 'Como é a alimentação atualmente? Come de tudo? Alimenta-se sozinho?',
            'type' => 'textual',
            'module_question_id' => '1',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('questions')->insert([
            'description' => 'Faz o uso do banheiro com independência?',
            'type' => 'textual',
            'module_question_id' => '1',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('questions')->insert([
            'description' => 'Que horas dorme de dia?',
            'type' => 'textual',
            'module_question_id' => '1',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('questions')->insert([
            'description' => 'Que horas dorme de noite?',
            'type' => 'textual',
            'module_question_id' => '1',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('questions')->insert([
            'description' => 'Alguma mania para dormir?',
            'type' => 'trueFalse',
            'module_question_id' => '1',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('questions')->insert([
            'description' => 'Qual a mania para dormir?',
            'type' => 'textual',
            'module_question_id' => '1',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('questions')->insert([
            'description' => 'Onde dorme?',
            'type' => 'textual',
            'module_question_id' => '1',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('questions')->insert([
            'description' => 'Como se faz entender?',
            'type' => 'textual',
            'module_question_id' => '1',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('questions')->insert([
            'description' => 'Quando a criança é contrariada, como reage?',
            'type' => 'textual',
            'module_question_id' => '1',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('questions')->insert([
            'description' => 'Do que a criança gosta de brincar e com quem?',
            'type' => 'textual',
            'module_question_id' => '1',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('questions')->insert([
            'description' => 'Por que você decidiu colocar seu filho na creche?',
            'type' => 'trueFalse',
            'module_question_id' => '1',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('questions')->insert([
            'description' => 'Os pais moram na mesma casa?',
            'type' => 'trueFalse',
            'module_question_id' => '1',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('questions')->insert([
            'description' => 'Sua casa é?',
            'type' => 'trueFalse',
            'module_question_id' => '1',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('questions')->insert([
            'description' => 'Qual o valor do aluguel da casa?',
            'type' => 'textual',
            'module_question_id' => '1',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('questions')->insert([
            'description' => 'Nº de pessoas que residem nessa mesma casa?',
            'type' => 'textual',
            'module_question_id' => '1',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('questions')->insert([
            'description' => 'Horário de atendimento disponível no ato da matrícula?',
            'type' => 'textual',
            'module_question_id' => '1',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('questions')->insert([
            'description' => 'Horário de atendimento requerido pelo responsável?',
            'type' => 'textual',
            'module_question_id' => '1',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('questions')->insert([
            'description' => 'Motivo pelo qual está requerendo outro horário?',
            'type' => 'textual',
            'module_question_id' => '1',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('questions')->insert([
            'description' => 'Observações sobre a criança/família?',
            'type' => 'textual',
            'module_question_id' => '1',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
    }
}
