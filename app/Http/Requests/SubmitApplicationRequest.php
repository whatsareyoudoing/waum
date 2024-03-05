<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubmitApplicationRequest extends FormRequest
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
            'name_application'  => 'required|unique:application|max:150',
        ];
    }

    public function messages(): array
    {
        return [
            'name_application.required' => 'Nama Application Wajib diisi.',
            'name_application.unique'   => 'Nama Sudah Digunakan',
            'name_application.max'      => 'Maksimal 150 karakter',
        ];
    }
}
