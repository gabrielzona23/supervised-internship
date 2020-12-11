<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'special_needs' => ['bail','required_if:special_needs_check,true', 'string', 'max:64'],
            'name' => ['bail','required', 'string', 'max:64', 'alpha'],
            'programs' => ['bail','string', 'max:64'],
            'nationality' => ['bail','string', 'max:32', 'alpha'],
            'born_city' => ['bail','string', 'max:32', 'alpha'],
            'born_state' => ['bail','string', 'max:32', 'alpha'],
            'job' => ['bail','string', 'max:32', 'alpha'],
            'number_car_sus' => ['bail','string', 'max:32'],
            'inep_code' => ['bail','string', 'max:32'],
            'nis' => ['bail','string', 'max:32'],
            'color' => ['bail','string', 'max:32'],
            'breed' => ['bail','string', 'max:32'],
            'image_authorization' => ['bail','required', 'boolean'],
            'special_needs_check' => ['bail','required', 'boolean'],
            'gender' => ['bail','string', 'max:64'],
            'born_date' => ['bail','required', 'date', 'min:10' ,'max:10'],
            'cpf' => ['bail','required', 'string', 'min:14', 'max:14'],
            'rg' => ['bail','required', 'string','numeric', 'min:5', 'max:20'],
            'emitter_rg' => ['bail','string', 'max:16', 'alpha'],
            'phone1' => ['bail','required', 'string', 'min:7', 'max:15'],
            'phone2' => ['bail','string', 'min:7', 'max:15'],
        ];
    }
}
