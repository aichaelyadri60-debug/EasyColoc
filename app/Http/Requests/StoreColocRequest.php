<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreColocRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'     =>'required|string|min:3|max:50',
            'address'  =>'required|string|min:3|max:100',
            'description'   =>'nullable|string|max:250'
        ];
    }


    public function messages():array{
        return [
            'name.required' =>'le nom et obligatoire',
            'name.string'   =>'le nom doit etre string',         
            'address.required' =>'l\'address et obligatoire',
            'address.string'   =>'l\'address doit etre string'
        ];
    }
}
