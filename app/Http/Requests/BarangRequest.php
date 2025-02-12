<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BarangRequest extends FormRequest
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
            'kode_barcode'                  => ['required', 'string', 'digits_between:13,13'],
            'nama_barang'                   => ['required', 'string', 'max:200'],
            'kategory_id'                   => ['required', 'string', 'exists:kategory,id'],
            'deskripsi_barang'              => ['required', 'string'],
        ];
    }
}
