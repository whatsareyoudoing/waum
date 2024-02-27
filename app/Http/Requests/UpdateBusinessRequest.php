<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBusinessRequest extends FormRequest
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
            'nama_business' => 'required|unique:business|max:150'
        ];
    }

    public function messages(): array
    {
        return [
            'nama_business.max' => 'Maksimal :max karakter',
            'nama_business.required' => 'Nama Business Wajib diisi',
            'nama_business.unique' => 'Nama Business Sudah digunakan'
        ];
    }
}
