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
            '1' => ['bail', 'max:1024'],
            // '2' => ['bail', 'boolean'],
            // '3' => ['bail', 'boolean'],
            '4' => ['bail', 'max:1024'],
            // '5' => ['bail', 'boolean'],
            '6' => ['bail', 'max:1024'],
            // '7' => ['bail', 'boolean'],
            '8' => ['bail', 'max:1024'],
            // '9' => ['bail', 'boolean'],
            '10' => ['bail', 'max:1024'],
            // '11' => ['bail', 'boolean'],
            '12' => ['bail', 'max:1024'],
            // '13' => ['bail', 'boolean'],
            '14' => ['bail', 'max:1024'],
            '15' => ['bail', 'max:1024'],
            '16' => ['bail', 'max:1024'],
            // '17' => ['bail', 'boolean'],
            '18' => ['bail', 'max:1024'],
            // '19' => ['bail', 'boolean'],
            '20' => ['bail', 'max:1024'],
            // '21' => ['bail', 'in:1,2,3'],
            '22' => ['bail', 'max:1024'],
            '23' => ['bail', 'max:1024'],
            '24' => ['bail', 'max:1024'],
            '25' => ['bail', 'max:1024'],
            '26' => ['bail', 'max:1024'],
            '27' => ['bail', 'max:1024'],
            '28' => ['bail', 'max:1024'],
            '29' => ['bail', 'max:1024'],
            '30' => ['bail', 'max:1024'],
            '31' => ['bail', 'max:1024'],
            '32' => ['bail', 'max:1024'],
            '33' => ['bail', 'max:1024'],
            '34' => ['bail', 'max:1024'],
            // '35' => ['bail', 'in:1,2,3'],
            // '36' => ['bail', 'boolean'],
            '37' => ['bail', 'max:1024'],
            '38' => ['bail', 'max:1024'],
            '39' => ['bail', 'max:1024'],
            '41' => ['bail', 'max:1024'],
        ];
    }
}
