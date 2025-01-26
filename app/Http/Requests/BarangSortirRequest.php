<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BarangSortirRequest extends FormRequest
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
        // Ambil parameter ID dari route (sesuai nama parameter di route)
        $id = $this->route('barangSortir');

        return [
            'nomor_nota_retur_barang'       => [
                'required',
                Rule::unique('barang_sortir', 'nomor_nota_retur_barang')->ignore($id), // Abaikan ID jika sedang update
                'string',
                'regex:/^[A-Z0-9]+$/',
                'max_digits:20'
            ],
            'barang_id'                     => ['required', 'integer', 'exists:barang,id'],
            'quantity_pcs'                  => ['required', 'numeric', 'min:0', 'max:999999'],
            'quantity_carton'               => ['required', 'numeric', 'min:0', 'max:999999'],
            'tanggal_expired'               => ['nullable', 'date'],
        ];
    }

    public function messages(): array
    {
        return [
            'barang_id.exists'      => 'Barang harus sudah terdaftar di menu barang',
            'barang_id.required'    => 'Nama Barang harus Diisi',
            'barang_id.string'      => 'Nama Barang harus berupa string.',
        ];
    }
}
