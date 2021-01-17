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

class AnamneseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Registration $registration)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        // $question = $student->booleanAnswers;
        // dd($question);
        $booleanQuestions = $student->booleanAnswers;
        // dd($booleanQuestions->where('description', 'Tipo de parto?')->first());
        $textualQuestions = $student->textualAnswers()->get();
        $scaleQuestions = $student->scaleAnswers()->get();
        $questions = Question::where('module_question_id', 1)->get();
        // foreach ($questions as $question) {
        //     if ($question->description === 'Tipo de parto?') {
        //         dd($question->booleanAnswers);
        //     }
        // }
        return view('questions.edit')->with('questions', $questions)->with('student', $student)->with('booleanQuestions', $booleanQuestions)->with('textualQuestions', $textualQuestions)->with('scaleQuestions', $scaleQuestions);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AnamneseRequest $request, Student $student)
    {
        try {
            DB::beginTransaction();
            $questionsAnamnese = Question::where('module_question_id', 1)->get();
            foreach ($request->except(['_token', '_method']) as $key => $input) {
                if ($input != null) {
                    $question = Question::find($key);
                    if ($question->type == 'textual') {
                        $student->textualAnswers()->sync([$key => ['value' => $input]]);
                    } elseif ($question->type == 'trueFalse') {
                        $student->booleanAnswers()->sync([$key => ['value' => $input]]);
                    } else {
                        $student->scaleAnswers()->sync([$key => ['value' => $input]]);
                    }
                }
            }
            DB::commit();
            Log::info('Successfully created Estudante');
            return redirect()->route('students.index')->with('message', 'Anamnese Atualizada com sucesso!');
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
