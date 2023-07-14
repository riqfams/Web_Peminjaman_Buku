<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnggotaRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nim' => 'unique:anggota|max:8'
        ];
    }

    public function messages()
    {
        return [
            'nim.unique' => 'NIM sudah ada!',
            'nim.max' => 'maksimal NIM :max angka'
        ];
    }
}
