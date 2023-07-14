<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdiRequest extends FormRequest
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
            'id' => 'unique:prodi|max:4',
            'name' => 'unique:prodi'
        ];
    }

    public function messages()
    {
        return [
            'id.unique' => 'ID sudah ada!',
            'id.max' => 'maksimal ID :max angka!',
            'name.unique' => 'Prodi sudah ada!'
        ];
    }
}
