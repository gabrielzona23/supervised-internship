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
        $students = Student::paginate(60);
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
        dd('oi');
        return view('students.show')->with('student', $student);
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
            $programsStudent = false;
            $programs = Program::all();
            $programsStudent = $student->programs->first();
            DB::commit();
            Log::info('Successfully updated Estudante');
            return view('students.edit-basic')->with('student', $student)->with('programs', $programs)->with('programsStudent', $programsStudent);
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

    public function editRegistrationStudent(Student $student, Registration $registration)
    {
        $programsStudent = false;
        $programs = Program::all();
        $programsStudent = $student->programs->first();
        $student = $registration->student;
        return view('students.edit')->with('student', $student)->with('programs', $programs)->with('programsStudent', $programsStudent)->with('registration', $registration);
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
        $validator = Validator::make($request->all(), Student::VALIDATORS_UPDATE);

        if ($validator->fails()) {
            Log::warning("Fail on data validate", ['errors' => $validator->errors()]);
            return redirect()->route('students.index')->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        $student->person()->update($request->only(['name', 'born_state', 'born_city',  'cpf', 'rg', 'emitter_rg', 'gender', 'nis', 'phone1', 'phone2']));
        $student->update($request->only(['born_date', 'nationality', 'breed', 'color', 'number_card_sus', 'inep_code', 'has_special_needs', 'special_educational_needs', 'g_mus', 'nationality']));

        if ($request->input('programs') != 0) {
            $student->programs()->attach($request->input('programs'));
        }
    }

    public function updateRegistration(Request $request, Student $student, Registration $registration)
    {
        $validator = Validator::make($request->all(), Student::VALIDATORS_UPDATE_REGISTRATION);

        if ($validator->fails()) {
            Log::warning("Fail on data validate", ['errors' => $validator->errors()]);
            return redirect()->route('registrations.edit')->withErrors($validator)->withInput();
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
