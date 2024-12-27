<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KategoryBarangRequest extends FormRequest
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
            'nama_barang'           => [
                'required',
                'string',
                'max:200',
                'unique:kategory_barang,nama_barang,' . ($this->user?->id ?: 'NULL')
            ],
            'kategory_barang'       => [
                'required',
                'string',
                'max:100'
            ],
        ];
    }
}
