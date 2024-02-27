<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpadatePasswordUserRequest extends FormRequest
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
            'password_user_baru' => ['required', 'max:50'],
            'konfirmasi_password_user_baru' => ['required', 'max:50'],
        ];
    }

    public function messages(): array
    {
        return [
            'password_user_baru.max' => 'Password User Maksimal :max',
            'password_user_baru.required' => 'Password User Wajib diisi',
            'konfirmasi_password_user_baru.max' => 'Konfirmasi Password User Maksimal :max',
            'konfirmasi_password_user_baru.required' => 'Konfirmasi Password User Wajib diisi',
        ];
    }
}
