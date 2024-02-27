<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        $id = $this->route()->id;
        return [
            'namalengkap_user' => ['required', 'max:150'],
            'namapanggilan_user' => ['required', 'max:25'],
            'username_user' => ['required', 'max:50','unique:user,username_user,'.$id.',id_user'],
            'email_user' => ['nullable','max:150','unique:user,email_user,'.$id.',id_user'],
            'telegram_user' => ['nullable','max:30','unique:user,telegram_user,'.$id.',id_user'],
            'roles' => ['nullable'],
        ];
    }

    public function messages(): array
    {
        return [
            'namalengkap_user.required' => 'Nama Lengkap User Wajib diisi',
            'namapanggilan_user.required' => 'Nama Panggilan User Wajib diisi',
            'username_user.required' => 'Username User Wajib diisi',
            'password.required' => 'Password User Wajib diisi',
            'namalengkap_user.max' => 'Nama lengkap Maksimal :max',
            'namapanggilan_user.max' => 'Nama Panggilan User Maksimal :max',
            'username_user.max' => 'Username User Maksimal :max',
            'email_user.max' => 'Email User Maksimal :max',
            'telegram_user.max' => 'Telegram User Maksimal :max',
            'username_user.unique' => 'Username User Sudah Digunakan',
            'email_user.unique' => 'Email User Sudah Digunakan',
            'telegram_user.unique' => 'Telegram User Sudah Digunakan',
        ];
    }
}
