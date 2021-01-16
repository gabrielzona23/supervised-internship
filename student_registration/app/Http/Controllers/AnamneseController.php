<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnamneseRequest;
use App\Models\Question;
use App\Models\Registration;
use App\Models\Student;
use Illuminate\Http\Request;

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
        $questions = Question::where('module_question_id', 1)->get();
        $student = $student;
        return view('questions.edit')->with('questions', $questions)->with('student', $student);
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

        $count = 1;
        $questionsAnamnese = Question::where('module_question_id', 1)->get();
        dd($questionsAnamnese->toArray());
        $array = array_map($questionsAnamnese->toArray(), $request->except(['_token', '_method']));
        dd($array);
        foreach ($array as $input) {

            // if($input!=null) {
            //     $student->
            // }
            $count++;
        }
        dd($request->all(), $student);
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
