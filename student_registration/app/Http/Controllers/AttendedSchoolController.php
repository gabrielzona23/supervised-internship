<?php

namespace App\Http\Controllers;

use App\Models\AttendedSchool;
use App\Models\Student;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AttendedSchoolController extends Controller
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
    public function create(Student $student)
    {
        return view('attendedSchool.create', compact('student'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeWithStudent(Request $request, Student $student)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), AttendedSchool::VALIDATORS_STORE);
            if ($validator->fails()) {
                Log::warning("Fail on data validate", ['errors' => $validator->errors()]);
                return redirect()->route('attendedSchool.create', $student)->withErrors($validator)->withInput();
            }
            $student->attendedSchools()->saveMany([
                new AttendedSchool($request->only(
                    'name',
                    'year',
                    'school_grade',
                    'network',
                    'type',
                    'city',
                    'administrative_department',
                ))
            ]);
            DB::commit();
            Log::info('Successfully created school');
            return redirect()->route('attendedSchool.create', $student)->withInput()->with('message', 'Escola cadastrada com sucesso!');
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(AttendedSchool $attendedSchool)
    {
        return view('attendedSchool.show')->with('attendedSchool', $attendedSchool);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editSchool(AttendedSchool $attendedSchool)
    {
        return view('attendedSchool.edit')->with('attendedSchool', $attendedSchool);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AttendedSchool $attendedSchool)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), AttendedSchool::VALIDATORS_STORE);
            if ($validator->fails()) {
                Log::warning("Fail on data validate", ['errors' => $validator->errors()]);
                return redirect()->route('attendedSchool.create', $attendedSchool->students[0])->withErrors($validator)->withInput();
            }
            $attendedSchool->update($request->only(
                'name',
                'year',
                'school_grade',
                'network',
                'type',
                'city',
                'administrative_department',
            ));
            DB::commit();
            Log::info('Successfully updated school');
            return redirect()->route('attendedSchool.create', $attendedSchool->students[0])->withInput()->with('message', 'Escola atualizada com sucesso!');
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
