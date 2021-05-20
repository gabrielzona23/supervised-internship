<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnamneseRequest;
use App\Models\Question;
use App\Models\Registration;
use App\Models\Student;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AnamneseController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $booleanQuestions = $student->booleanAnswers;
        $textualQuestions = $student->textualAnswers;
        $scaleQuestions = $student->scaleAnswers;
        $question = Question::where('type', 'scalar2')->first();
        $questions = Question::where('module_question_id', 1)->get();
        return view('questions.edit', compact('questions', 'student', 'booleanQuestions', 'textualQuestions', 'scaleQuestions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        try {
            $validator = Validator::make($request->all(), Question::VALIDATORS_STORE);
            if ($validator->fails()) {
                Log::warning("Fail on data validate", ['errors' => $validator->errors()]);
                return redirect()->route('anamneses.edit', $student)->withErrors($validator)->withInput();
            }
            DB::beginTransaction();
            foreach ($request->except(['_token', '_method']) as $key => $input) {
                if ($input != null) {
                    $question = Question::find($key);
                    if ($question->type == 'textual') {
                        $student->textualAnswers()->detach($key);
                        $student->textualAnswers()->attach([$key => ['value' => $input]]);
                    } elseif ($question->type == 'trueFalse') {
                        $student->booleanAnswers()->detach($key);
                        $student->booleanAnswers()->attach([$key => ['value' => $input]]);
                    } else {
                        $student->scaleAnswers()->detach($key);
                        $student->scaleAnswers()->attach([$key => ['value' => $input]]);
                    }
                }
            }
            DB::commit();
            Log::info('Successfully created Estudante');
            return redirect()->route('students.editForm', compact('student'))->with('message', 'Anamnese Atualizada com sucesso!');
        } catch (ModelNotFoundException $m) {
            DB::rollback();
            Log::error('No query result', ['errors' => $m]);
            return view('erros.not-found-404')->with('problem', 'Dados não encontrados!');
        } catch (QueryException $q) {
            DB::rollback();
            Log::error('Internal database error', ['errors' => $q]);
            return view('erros.service-unavailable-503')->with('problem', 'Erro no Banco de dados!');
        } catch (\Throwable $t) {
            DB::rollback();
            Log::error('Internal server error', ['errors' => $t]);
            return view('erros.internal-serve-error-500')->with('problem', 'Erro no Servidor!');
        }
    }
}
