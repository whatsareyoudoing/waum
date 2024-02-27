<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoleSubmitRequest extends FormRequest
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
            'id_company' => ['required'],
            'nama_role' => ['required', 'max:150', Rule::unique('role')->where('id_company', $this->input('id_company'))]
        ];
    }

    public function messages(): array
    {
        return [
            'id_company.required' => 'Company Role Wajib diisi',
            'nama_role.required' => 'Nama Role Wajib diisi',
            'nama_role.unique' => 'Nama Role Sudah ada'
        ];
    }
}
