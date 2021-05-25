<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Person;
use App\Models\Phone;
use App\Models\Program;
use App\Models\Registration;
use App\Models\Student;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $students = Student::get();
        return view('students.index')->with('students', $students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programs = Program::all();
        return view('students.create')->with('programs', $programs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            // $validator = Validator::make($request->all(), Student::VALIDATORS_STORE);

            // if ($validator->fails()) {
            //     Log::warning("Fail on data validate", ['errors' => $validator->errors()]);
            //     return redirect()->route('students.create')->withErrors($validator)->withInput();
            // }

            DB::beginTransaction();
            $person = new Person();
            $person->name = $request->input('name');
            $person->born_state = $request->input('born_state');
            $person->born_city = $request->input('born_city');
            $person->cpf = $request->input('cpf');
            $person->rg = $request->input('rg');
            $person->emitter_rg = $request->input('emitter_rg');
            $person->gender = $request->input('gender');
            $person->created_by = Auth::user()->id;
            $person->save();

            $student = new Student();
            $inputStudent = $request->only(['born_date', 'nationality', 'breed', 'color', 'number_card_sus', 'inep_code', 'nis']);
            $inputStudent['person_id'] = $person->id;
            $inputStudent['status'] = 'studying';
            $inputStudent['created_by'] =  Auth::user()->id;
            $student->fill($inputStudent);
            $student->save();

            $student->specialNeeds()->attach($request->input('special_needs'));

            $student->programs()->attach($request->input('programs'));

            $registration = new Registration();
            $registration->image_authorization = $request->input('image_authorization');
            $registration->created_by =  Auth::user()->id;
            $registration->updated_by =  Auth::user()->id;
            $registration->student_id = $student->id;

            // $student->programs()->attach($request->input('programs'));

            if ($request->input('job') != null) {
                $job = new Job();
                $job->name = $request->input('job');
                $job->save();
                $person->jobs()->attach($job->id);
            }

            DB::commit();
            Log::info('Successfully created Estudante');
            return redirect()->route('students.create')->with('message', 'Cadastro realizado com sucesso!')->withInput()->with('student', $student);
        } catch (QueryException $q) {
            DB::rollBack();
            Log::error('Internal Server Error', ['errors' => $q]);
            return redirect()->route('students.create')->with('problem', $q);
        } catch (\Throwable $t) {
            DB::rollBack();
            Log::critical('Internal Server Error', ['errors' => $t]);
            return redirect()->route('students.create')->with('problem', $t);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('students.show')->with('student', $student);
    }
    /**
     * Undocumented function
     *
     * @param Student $student
     * @return \Illuminate\Http\Response
     */
    public function editForm(Student $student)
    {
        return view('students.forms', compact('student'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        try {
            DB::beginTransaction();
            $programs = Program::all();
            $programsStudent = $student->programs->first();
            if ($programsStudent != null) {
                $programsStudent_id = $programsStudent->id;
            } else {
                $programsStudent_id = 0;
            }
            DB::commit();
            Log::info('Successfully updated Estudante');
            return view('students.edit-basic')->with(['student' => $student, 'programs' => $programs, 'programsStudent_id' => $programsStudent_id]);
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

    public function editRegistrationStudent(Registration $registration)
    {
        try {
            DB::beginTransaction();
            $programs = Program::all();
            $programsStudent = $registration->student->programs->first();
            if ($programsStudent != null) {
                $programsStudent_id = $programsStudent->id;
            } else {
                $programsStudent_id = 0;
            }
            $student = $registration->student;
            return view('students.edit')->with(['student' => $student, 'programs' => $programs, 'programsStudent_id' => $programsStudent_id, 'registration' => $registration]);
            DB::commit();
            Log::info('Successfully updated Estudante');
            return view('students.edit-basic')->with(['student' => $student, 'programs' => $programs, 'programsStudent_id' => $programsStudent_id]);
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

    public function update(Request $request, Student $student)
    {
        $validator = Validator::make($request->all(), Student::VALIDATORS_UPDATE);
        if ($validator->fails()) {
            Log::warning("Fail on data validate", ['errors' => $validator->errors()]);
            return redirect()->route('students.edit', compact('student'))->withErrors($validator)->withInput();
        }
        try {
            DB::beginTransaction();
            $student->person()->update($request->only(['name', 'born_state', 'born_city', 'phone1']));
            $student->person()->update([
                'gender' => $request->gender,
                'emitter_rg' => $request->emitter_rg,
                'rg' => $request->rg,
                'cpf' => $request->cpf,
                'nis' => $request->nis,
                'phone2' => $request->phone2,
            ]);
            if ($request->job != null) {
                $job = Job::where('person_id', $student->person->id)->first();
                if ($job == null) {
                    Job::create(['name' => $request->job, 'person_id' => $student->person->id]);
                } else {
                    $job->name = $request->job;
                    $job->save();
                }
            } else if ($student->person->job != null) {
                $student->person->job->delete();
            }
            $student->born_date = $request->born_date;
            $student->nationality = $request->nationality;
            $student->has_special_needs = $request->has_special_needs;
            $student->g_mus = $request->g_mus;
            $student->number_card_sus = $request->number_card_sus;
            $student->inep_code = $request->inep_code;
            $student->breed = $request->breed;
            $student->color = $request->color;
            $student->special_educational_needs = $request->special_educational_needs;
            $student->save();
            if ($request->input('programs') != 0) {
                $student->programs()->sync($request->input('programs'));
            } else if ($request->input('programs') == 0) {
                $student->programs()->detach();
            }
            DB::commit();
            Log::info('Successfully updated Student');
            return redirect()->route('students.edit', compact('student'))->with('message', 'Dados do aluno atualizado com sucesso!');
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_registration(Request $request, Registration $registration)
    {
        $validator = Validator::make($request->all(), Student::VALIDATORS_UPDATE_REGISTRATION);
        if ($validator->fails()) {
            Log::warning("Fail on data validate", ['errors' => $validator->errors()]);
            return redirect()->route('students.editRegistrationStudent', compact('registration'))->withErrors($validator)->withInput();
        }
        try {
            DB::beginTransaction();
            $registration->student->person()->update($request->only(['name', 'born_state', 'born_city', 'phone1']));
            $registration->student->person()->update([
                'gender' => $request->gender,
                'emitter_rg' => $request->emitter_rg,
                'rg' => $request->rg,
                'cpf' => $request->cpf,
                'nis' => $request->nis,
                'phone2' => $request->phone2,
            ]);
            if ($request->job != null) {
                $job = Job::where('person_id', $registration->student->person->id)->first();
                if ($job == null) {
                    Job::create(['name' => $request->job, 'person_id' => $registration->student->person->id]);
                } else {
                    $job->name = $request->job;
                    $job->save();
                }
            } else if ($registration->student->person->job != null) {
                $registration->student->person->job->delete();
            }
            $registration->student()->update($request->only(['born_date', 'nationality', 'has_special_needs', 'nationality']));
            $registration->student()->update([
                'g_mus' => $request->g_mus,
                'breed' => $request->breed,
                'color' => $request->color,
                'inep_code' => $request->inep_code,
                'number_card_sus' => $request->number_card_sus,
                'special_educational_needs' => $request->special_educational_needs,
            ]);
            if ($request->input('programs') != 0) {
                $registration->student->programs()->sync($request->input('programs'));
            } else if ($request->input('programs') == 0) {
                $registration->student->programs()->detach();
            }
            $registration->school_year = $request->input('school_year');
            $registration->image_authorization = $request->input('image_authorization');
            $registration->updated_by = $request->user()->id;
            $registration->save();
            DB::commit();
            Log::info('Successfully updated Student');
            return redirect()->route('students.editRegistrationStudent', compact('registration'))->with('message', 'Dados do aluno atualizado com sucesso!');
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
