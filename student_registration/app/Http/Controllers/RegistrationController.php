<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Phone;
use App\Models\Person;
use App\Models\Student;
use App\Models\Program;
use Illuminate\Http\Request;
use App\Models\Registration;
use App\Services\AddressService;
use App\Services\DocumentService;
use App\Services\PersonService;
use App\Services\RegistrationService;
use App\Services\ResponsiblyService;
use App\Services\StudentService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    private $addressService, $personService;

    public function __construct(AddressService $addressService, PersonService $personService)
    {
        $this->addressService = $addressService;
        $this->personService = $personService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $registration = Registration::paginate();
        dd($registration);
        return view('registrations.index')->with('registration', $registration);
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
        // try {
        $validator = Validator::make($request->all(), Registration::VALIDATORS_STORE);
        if ($validator->fails()) {
            Log::warning("Fail on data validate", ['errors' => $validator->errors()]);
            return redirect()->route('registrations.create')->withErrors($validator)->withInput();
        }

        DB::beginTransaction();
        $data_person_student = $request->only(
            ['name', 'born_state', 'born_city',  'cpf', 'rg', 'emitter_rg', 'gender', 'nis']
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

        $data_registration = $request->only('image_authorization', 'parents_divorced', 'guard_document', 'student_custody', 'number_card_family_bag');
        $data_registration['student_id'] = $student->id;
        $registrationService = new RegistrationService();
        $registration = $registrationService->store($data_registration);

        if ($request->input('job') != null) {
            $job = new Job();
            $job->name = $request->input('job');
            $job->save();
            $person->jobs()->attach($job->id);
        }

        $phone1 = new Phone();
        $phone1->number = $request->input('phone1');
        $phone1->person_id = $person->id;
        $phone1->save();

        if ($request->input('phone2') != null) {
            $phone2 = new Phone();
            $phone2->number = $request->input('phone2');
            $phone2->person_id = $person->id;
            $phone2->save();
        }

        $data_address = $request->only(
            'city',
            'number',
            'street',
            'branch_line',
            'residential_area',
            'state',
            'country',
            'neighborhood',
            'cep',
            'complement',
            'electrical_installation_code',
            'reference'
        );
        $data_address['person_id'] = $person->id;
        $address = $this->addressService->store($data_address);


        $person_responsibly = $this->personService->storeResponsibly($request);

        $data_responsibly = $request->only([
            'kinship', 'family_bag'
        ]);
        $data_responsibly['person_id'] = $person_responsibly->id;
        $responsiblyService = new ResponsiblyService();
        $responsibly = $responsiblyService->store($data_responsibly);

        $phone3 = new Phone();
        $phone3->number = $request->input('phone3');
        $phone3->person_id = $person_responsibly->id;
        $phone3->save();

        if ($request->input('phone4') != null) {
            $phone4 = new Phone();
            $phone4->number = $request->input('phone4');
            $phone4->person_id = $person_responsibly->id;
            $phone4->save();
        }
        $documentService = new DocumentService();
        $documents = $documentService->store($request, $registration);


        DB::commit();
        Log::info('Successfully created Estudante');
        return redirect()->route('registrations.create')->with('message', 'Cadastro realizado com sucesso!')->withInput()->with('student', $student);
        // } catch (QueryException $q) {
        //     DB::rollBack();
        //     Log::error('Internal Server Error', ['errors' => $q]);
        //     return redirect()->route('registrations.create')->with('problem', 'Falha ao realizar cadastro!');
        // } catch (\Throwable $t) {
        //     DB::rollBack();
        //     Log::critical('Internal Server Error', ['errors' => $t]);
        //     return redirect()->route('registrations.create')->with('problem', 'Falha ao realizar cadastro!');
        // }
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
    public function edit($id)
    {
        //
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
        //
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
