<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubmitCompanyRequest extends FormRequest
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
            'id_business' => ['required'],
            'kode_company' => ['required', 'max:5','unique:company'],
            'currency_company' => ['required', 'max:50'],
            'nama_company' => ['required', 'max:150'],
            'alamat_company' => ['required', 'max:250'],
            'telp_company' => ['required', 'max:20'],
            'email_company' => ['required', 'max:100'],
        ];
    }

    public function messages(): array
    {
        return [
            'id_business.required' => 'Nama Bisnis Wajib diisi',
            'kode_company.required' => 'Kode Company Wajib diisi',
            'kode_company.unique'   => 'Kode Sudah Digunakan',
            'currency_company.required' => 'Currency Company Wajib diisi',
            'nama_company.required' => 'Nama Company Wajib diisi',
            'kode_company.max' => 'Kode Company Maksimal :max',
            'currency_company.max' => 'Currency Company Maksimal :max',
            'nama_company.max' => 'Nama Company Maksimal :max',
            'alamat_company.max' => 'Alamat Company Maksimal :max',
            'telp_company.max' => 'Telpon Company Maksimal :max',
            'email_company.max' => 'Email Company Maksimal :max',
        ];
    }
}
