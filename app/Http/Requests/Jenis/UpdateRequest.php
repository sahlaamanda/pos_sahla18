<?php

namespace App\Http\Requests\Jenis;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $jenisId = $this->route('jenis')?->id;

        return [
            'nama_jenis' => [
                'required',
                'string',
                'max:255',
                Rule::unique('jenis', 'nama_jenis')->ignore($jenisId),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'nama_jenis.required' => 'Nama jenis wajib diisi.',
            'nama_jenis.string' => 'Nama jenis harus berupa teks.',
            'nama_jenis.max' => 'Nama jenis maksimal 255 karakter.',
            'nama_jenis.unique' => 'Nama jenis sudah digunakan.',
        ];
    }
}