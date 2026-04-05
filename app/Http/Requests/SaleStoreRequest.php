<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaleStoreRequest extends FormRequest
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
            'serial_id'      => ['required','array','min:1'],
            'serial_id.*'    => ['required','string'],
        ];
    }

    public function messages()
    {
        return[
            'serial_id.required'         => 'At least one Stock ID is required.',
            'serial_id.array'            => 'Stock IDs must be submitted as an array.',
            'serial_id.*.required'       => 'Each Stock ID field must not be empty.'
        ];
    }
}
