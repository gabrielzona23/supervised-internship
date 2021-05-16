<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Address;
use App\Models\Registration;
use Illuminate\Http\Request;
use App\Services\AddressService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AddressController extends Controller
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
    public function createAddressStudent(Student $student)
    {
        return view('address.create', compact('student'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAddressStudent(Request $request, Student $student)
    {

        try {
            $validator = Validator::make($request->all(), Address::VALIDATORS_STORE);
            if ($validator->fails()) {
                Log::warning("Fail on data validate", ['errors' => $validator->errors()]);
                return redirect()->route('address.createAddressStudent', $student)->withErrors($validator)->withInput();
            }

            DB::beginTransaction();
            $addressService = new AddressService();
            $address = $addressService->store($request, $student);
            DB::commit();
            Log::info('Successfully created address');
            return redirect()->route('address.createAddressStudent', $student)->withInput()->with('message', 'Endereço Atualizado com sucesso!');
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
    public function show(Address $address)
    {
        return view('address.show')->with('address', $address);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        return view('address.edit')->with('address', $address);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        $validator = Validator::make($request->all(), Address::VALIDATORS_STORE);
        if ($validator->fails()) {
            Log::warning("Fail on data validate", ['errors' => $validator->errors()]);
            return redirect()->route('address.edit', $address)->withErrors($validator)->withInput();
        }

        try {
            DB::beginTransaction();
            $address->update($request->all());
            DB::commit();
            Log::info('Successfully activation address');
            return redirect()->route('address.createAddressStudent', $address->students[0])->withInput()->with('message', 'Endereço Atualizado com sucesso!');
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
    public function activeAddressStudent(Request $request, Student $student, Address $addressForActive)
    {
        try {
            DB::beginTransaction();
            foreach ($student->addresses as $address) {
                $address->where('status', 'Ativo')->update(['status' => 'Inativo']);
            }
            $addressForActive->status = "Ativo";
            $addressForActive->save();
            DB::commit();
            Log::info('Successfully activation address');
            return redirect()->route('address.createAddressStudent', $student)->withInput()->with('message', 'Endereço Ativado com sucesso!');
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
