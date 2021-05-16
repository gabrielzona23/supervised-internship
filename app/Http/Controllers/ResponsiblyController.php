<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Responsibly;
use App\Models\Registration;
use Illuminate\Http\Request;
use App\Services\PersonService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Services\ResponsiblyService;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ResponsiblyController extends Controller
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
     * Undocumented function
     *
     * @param Registration $registration
     * @return void
     */
    public function create(Registration $registration)
    {
        return view('responsible.create', compact('registration'));
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @param Registration $registration
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Registration $registration)
    {
        $validator = Validator::make($request->all(), Responsibly::VALIDATORS_STORE);
        if ($validator->fails()) {
            Log::warning("Fail on data validate", ['errors' => $validator->errors()]);
            return redirect()->route('responsible.create', $registration)->withErrors($validator)->withInput();
        }
        try {
            DB::beginTransaction();
            $personService = new PersonService();
            $person_responsibly = $personService->storeResponsibly($request);
            $data_responsibly = $request->only([
                'kinship', 'family_bag'
            ]);

            $data_responsibly['person_id'] = $person_responsibly->id;
            $responsiblyService = new ResponsiblyService();
            $responsibly = $responsiblyService->store($data_responsibly);
            $registration->update($request->only('parents_divorced', 'guard_document', 'image_authorization', 'student_custody'));
            $registration->responsiblies()->where('active', true)->update(['active' => false]);
            $registration->responsiblies()->attach($responsibly->id);
            DB::commit();
            Log::info('Successfully created responsibly');
            return redirect()->route('responsible.create', $registration)->withInput()->with('message', 'Responsável cadastrado com sucesso!');
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
    public function show(Responsibly $responsible)
    {
        return view('responsible.show')->with('responsible', $responsible);
    }

    /**
     * Undocumented function
     *
     * @param Responsibly $responsible
     * @return void
     */
    public function edit(Responsibly $responsible)
    {
        return view('responsible.edit')->with('responsible', $responsible);
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @param Responsibly $responsible
     * @return void
     */
    public function update(Request $request, Responsibly $responsible)
    {
        $validator = Validator::make($request->all(), Responsibly::VALIDATORS_UPDATE);
        if ($validator->fails()) {
            Log::warning("Fail on data validate", ['errors' => $validator->errors()]);
            return redirect()->route('responsible.edit', $responsible->registrations[0])->withErrors($validator)->withInput();
        }
        try {
            DB::beginTransaction();
            $personService = new PersonService();
            $personService->updateResponsibly($responsible, $request);
            $responsible->update($request->only(['kinship', 'family_bag']));
            foreach ($responsible->registrations as $registration) {
                $registration->update($request->only('parents_divorced', 'guard_document', 'image_authorization', 'student_custody'));
                break;
            }
            DB::commit();
            Log::info('Successfully created responsible');
            return redirect()->route('responsible.create', $responsible->registrations[0])->with('message', 'Responsável cadastrado com sucesso!');
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
     * Undocumented function
     *
     * @param Request $request
     * @param Registration $registration
     * @param Responsibly $responsibleForActive
     * @return void
     */
    public function activeResponsibleStudent(Request $request, Registration $registration, Responsibly $responsibleForActive)
    {
        DB::beginTransaction();
        try {
            foreach ($registration->responsiblies as $responsible) {
                $responsible->where('active', true)->update(['active' => false]);
            }
            $responsibleForActive->active = true;
            $responsibleForActive->save();
            DB::commit();
            Log::info('Successfully activation responsible');
            return redirect()->route('responsible.create', $registration)->with('message', "O Responsável " . $responsibleForActive->person->name . "foi ativado com sucesso!");
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
