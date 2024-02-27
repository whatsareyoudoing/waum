<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubmitMenuRequest extends FormRequest
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
            'id_application' => ['required'],
            'kode_menu' => ['required', 'max:50','unique:menu'],
            'nama_menu' => ['required', 'max:150'],
            'url_menu' => ['required', 'max:50'],
            'canother1label_menu' => ['max:50'],
            'canother2label_menu' => ['max:50'],
            'canother3label_menu' => ['max:50'],
            'canother4label_menu' => ['max:50'],
            'canother5label_menu' => ['max:50'],
            'canother6label_menu' => ['max:50'],
            'canother7label_menu' => ['max:50'],
            'canother8label_menu' => ['max:50'],
            'canother9label_menu' => ['max:50'],
            'canother10label_menu' => ['max:50'],
        ];
    }

    public function messages(): array
    {
        return [
            'id_application.required' => 'Nama Application Wajib diisi',
            'kode_menu.required' => 'Kode Menu Wajib diisi',
            'kode_menu.unique'   => 'Kode Sudah Digunakan',
            'url_menu.required' => 'URL Menu Wajib diisi',
            'nama_menu.required' => 'Nama Menu Wajib diisi',
            'kode_menu.max' => 'Kode Menu Maksimal :max',
            'canother1label_menu.max' => 'Label Menu 1 Maksimal :max',
            'canother2label_menu.max' => 'Label Menu 2 Maksimal :max',
            'canother3label_menu.max' => 'Label Menu 3 Maksimal :max',
            'canother4label_menu.max' => 'Label Menu 4 Maksimal :max',
            'canother5label_menu.max' => 'Label Menu 5 Maksimal :max',
            'canother6label_menu.max' => 'Label Menu 6 Maksimal :max',
            'canother7label_menu.max' => 'Label Menu 7 Maksimal :max',
            'canother8label_menu.max' => 'Label Menu 8 Maksimal :max',
            'canother9label_menu.max' => 'Label Menu 9 Maksimal :max',
            'canother10label_menu.max' => 'Label Menu 10 Maksimal :max',
        ];
    }
}
