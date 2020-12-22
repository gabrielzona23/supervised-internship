<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        $request->session()->reflash();
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
            'special_needs' => ['bail','required_if:special_needs_check,1', 'string', 'max:64'],
            'name' => ['bail','required', 'string', 'max:64'],
            'programs' => ['bail', 'max:64'],
            'nationality' => ['bail', 'max:32'],
            'born_city' => ['bail', 'max:32'],
            'born_state' => ['bail', 'max:32'],
            'job' => ['bail', 'max:32'],
            'number_car_sus' => ['bail', 'max:32'],
            'inep_code' => ['bail', 'max:32'],
            'nis' => ['bail', 'max:32'],
            'color' => ['bail', 'max:32'],
            'breed' => ['bail', 'max:32'],
            'image_authorization' => ['bail','required', 'boolean'],
            'special_needs_check' => ['bail','required', 'boolean'],
            'gender' => ['bail', 'max:64'],
            'born_date' => ['bail','required', 'date', 'min:10' ,'max:10'],
            'cpf' => ['bail','required', 'min:14', 'max:14'],
            'rg' => ['bail','required', 'min:5', 'max:20'],
            'emitter_rg' => ['bail', 'max:16'],
            'phone1' => ['bail','required', 'min:7', 'max:15'],
            'phone2' => ['bail', 'max:15'],
        ];
    }
}
