<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['bail', 'required', 'string', 'max:64'],
            'rg' => ['bail', 'max:20'],
            'cpf' => ['bail', 'max:14'],
            'born_state' => ['bail', 'required', 'max:32'],
            'born_city' => ['bail', 'required', 'max:32'],
            'emitter_rg' => ['bail', 'required_unless:rg,null', 'max:16'],
            'gender' => ['bail', 'max:64'],

            'job' => ['bail', 'max:32'],

            'born_date' => ['bail', 'required', 'date', 'before_or_equal:yesterday', 'min:10', 'max:10'],
            'nationality' => ['bail', 'required', 'max:32'],
            'number_car_sus' => ['bail', 'max:32'],
            'g_mus' => ['bail', 'max:64'],
            'inep_code' => ['bail', 'max:32'],
            'color' => ['bail', 'max:32'],
            'breed' => ['bail', 'max:32'],
            'has_special_needs' => ['bail', 'required', 'boolean'],
            'special_educational_needs' => ['bail', 'required_unless:has_special_needs,0', 'max:64'],

            'phone1' => ['bail', 'required', 'min:7', 'max:15'],
            'phone2' => ['bail', 'max:15'],
            'programs' => ['bail', 'required', 'max:64'],
            'nis' => ['bail', 'max:32'],

            'street' => ['bail', 'required', 'string', 'min:6', 'max:64'],
            'city' => ['bail', 'required', 'min:6', 'max:128'],
            'state' => ['bail', 'required', 'min:6', 'max:64'],
            'neighborhood' => ['bail', 'required', 'min:6', 'max:64'],
            'country' => ['bail', 'required', 'min:6', 'max:64'],
            'cep' => ['bail', 'required', 'min:9', 'max:12'],
            'number' => ['bail', 'required', 'min:2', 'max:32'],
            'electrical_installation_core' => ['bail', 'max:32'],
            'residential_area' => ['bail', 'required', 'in:Rural,Urbana'],
            'type_transport' => ['bail', 'in:Público, Particular, Escolar, Variado'],
            'reference' => ['bail', 'max:255'],
            'complement' => ['bail', 'max:255'],
            'buses_name' => ['bail', 'max:64'],
            'transport_localization' => ['bail', 'max:64'],
            'route' => ['bail', 'max:64'],

            'name1' => ['bail', 'required', 'string', 'max:64'],
            'cpf1' => ['bail', 'required', 'min:14', 'max:14'],
            'rg1' => ['bail', 'required', 'min:5', 'max:20'],
            'emitter_rg1' => ['bail', 'required', 'min:2', 'max:16'],
            'nis1' => ['bail', 'max:32'],

            'number_car_family_bag' => ['bail', 'max:32'],
            'family_bag' => ['bail', 'required'],
            'kinship' => ['bail', 'max:64'],

            'phone3' => ['bail', 'required', 'min:7', 'max:15'],
            'phone4' => ['bail', 'max:15'],

            'student_custody' => ['bail', 'max:32'],
            'school_year' => ['bail', 'date_format:Y'],

            'document_model' => ['bail', 'required', 'in:new,old,others'],
            'document_number' => ['bail', 'required', 'string', 'max:32'],
            'name_registry' => ['required_if:document_model,old', 'max:255'],
            'emission_date' => ['required_if:document_model,old',],
            'term_number' => ['required_if:document_model,old', 'max:64'],
            'sheet_number' => ['required_if:document_model,old', 'max:64'],
            'book_number' => ['required_if:document_model,old', 'max:64'],
            'state_registry' => ['required_if:document_model,old', 'max:64']
        ];
    }
}
