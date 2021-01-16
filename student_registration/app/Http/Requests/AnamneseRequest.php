<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnamneseRequest extends FormRequest
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
            '1' => ['bail', 'required_if:special_needs_check,1', 'string', 'max:64'],
            '2' => ['bail', 'required', 'string', 'max:64'],
            '3' => ['bail', 'max:64'],
            '4' => ['bail', 'max:32'],
            '5' => ['bail', 'max:32'],
            '6' => ['bail', 'max:32'],
            '7' => ['bail', 'max:32'],
            '8' => ['bail', 'max:32'],
            '9' => ['bail', 'max:32'],
            '10' => ['bail', 'max:32'],
            '11' => ['bail', 'max:32'],
            '12' => ['bail', 'max:32'],
            '13' => ['bail', 'required', 'boolean'],
            '14' => ['bail', 'required', 'boolean'],
            '15' => ['bail', 'max:64'],
            '16' => ['bail', 'required', 'date', 'min:10', 'max:10'],
            '17' => ['bail', 'required', 'min:14', 'max:14'],
            '18' => ['bail', 'required', 'min:5', 'max:20'],
            '19' => ['bail', 'max:16'],
            '20' => ['bail', 'required', 'min:7', 'max:15'],
            'phone2' => ['bail', 'max:15'],
        ];
    }
}
