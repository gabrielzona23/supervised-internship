<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
        ];
    }
}
