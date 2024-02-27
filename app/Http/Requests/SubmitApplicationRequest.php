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
            'kode_application'  => 'required|unique:application|max:10',
            'nama_application'  => 'required|max:150',
        ];
    }

    public function messages(): array
    {
        return [
            'kode_application.required' => 'Kode Application Wajib diisi.',
            'kode_application.unique'   => 'Kode Sudah Digunakan',
            'kode_application.max'      => 'Maksimal 10 karakter',

            'nama_application.required' => 'Nama Application Wajib diisi.',
            'nama_application.max'      => 'Maksimal 150 karakter',
        ];
    }
}