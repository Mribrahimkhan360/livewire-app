<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserMappingRequest extends FormRequest
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
            'distributor_id'    => 'required|exists:users,id',
            'customer_id'       => 'required|exists:users,id',
        ];
    }
    public function messages()
    {
        return [
            'distributor_id.required'   =>  'Selecting Distributor is mandatory',
            'customer_id.required'      =>  'Selecting Customer is mandatory',
            'distributor_id.exists'     => 'Invalid distributor selected',
            'customer_id.exists'        => 'Invalid customer selected',
        ];
    }
}
