<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoleUpdateRequest extends FormRequest
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
        $idRole = $this->route()->idRole;
        return [
            'id_company' => ['required'],
            'nama_role' => ['required', 'max:150', Rule::unique('role')->where(function ($query) use ($idRole) {
                return $query->where('id_company', $this->input('id_company'))
                    ->whereNot('id_role', $idRole);
            })],
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
