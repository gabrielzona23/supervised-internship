<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Program;
use Illuminate\Http\Request;
use App\Models\Registration;
use App\Services\PersonService;
use App\Services\StudentService;
use App\Services\AddressService;
use App\Services\DocumentService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Services\ResponsiblyService;
use App\Services\RegistrationService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $registrations = Registration::get();
        return view('registrations.index')->with('registrations', $registrations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programs = Program::all();
        return view('registrations.create')->with('programs', $programs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        try {
            $validator = Validator::make($request->all(), Registration::VALIDATORS_STORE);
            if ($validator->fails()) {
                Log::warning("Fail on data validate", ['errors' => $validator->errors()]);
                return redirect()->route('registrations.create')->withErrors($validator)->withInput();
            }

            DB::beginTransaction();
            $data_person_student = $request->only(
                ['name', 'born_state', 'born_city',  'cpf', 'rg', 'emitter_rg', 'gender', 'nis', 'phone1', 'phone2']
            );
            $personService = new PersonService();
            $person = $personService->store($data_person_student);

            $data_student = $request->only([
                'born_date', 'nationality', 'breed', 'color', 'number_card_sus', 'inep_code', 'has_special_needs', 'special_educational_needs', 'g_mus'
            ]);
            $data_student['person_id'] = $person->id;
            $studentService = new StudentService();
            $student = $studentService->store($data_student);

            if ($request->input('programs') != 0) {
                $student->programs()->attach($request->input('programs'));
            }

            $data_student = $request->only([
                'born_date', 'nationality', 'ethnicity', 'breed', 'color', 'number_card_sus', 'inep_code', 'status'
            ]);

            $data_registration = $request->only('image_authorization', 'parents_divorced', 'guard_document', 'student_custody', 'number_card_family_bag', 'school_year');
            $data_registration['student_id'] = $student->id;
            $registrationService = new RegistrationService();
            $registration = $registrationService->store($data_registration);
            if ($request->input('job') != null) {
                $job = new Job();
                $job->name = $request->input('job');
                $job->person_id = $person->id;
                $job->save();
            }

            $data_address = $request->only([
                'street',
                'city',
                'state',
                'neighborhood',
                'country',
                'cep',
                'number',
                'electrical_installation_code',
                'residential_area',
                'type_transport',
                'reference',
                'complement',
                'buses_name',
                'transport_localization',
                'route',
            ]);
            $data_address['student_id'] = $student->id;
            $addressService = new AddressService();
            $addressService->storeRegistration($data_address);


            $person_responsibly = $personService->storeResponsibly($request);

            $data_responsibly = $request->only([
                'kinship', 'family_bag'
            ]);
            $data_responsibly['person_id'] = $person_responsibly->id;
            $responsiblyService = new ResponsiblyService();
            $responsibly = $responsiblyService->store($data_responsibly);

            $registration->responsiblies()->attach($responsibly->id);


            $documentService = new DocumentService();
            $documentService->store($request, $registration);

            DB::commit();
            Log::info('Successfully registration Estudante');
            return redirect()->route('registrations.create', compact('student'))->with('message', 'Matricula realizado com sucesso!')->withInput();
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Registration $registration)
    {
        return view('registrations.forms', compact('registration'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
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
