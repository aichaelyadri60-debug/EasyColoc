<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDepenseRequest extends FormRequest
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
            'title'   => 'required|string|max:50',
            'montant' => 'required|numeric|min:2',
            'description'   => 'nullable|string|max:150'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => ' title et obligatoire',
            'title.string'   => ' title doit etre string',
            'montant.required' => 'montant et obligatoire'
        ];
    }
}
