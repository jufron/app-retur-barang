<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DataLogistikRequest extends FormRequest
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
            'no_nota_retur_barang'       => [
                'required',
                Rule::unique('data_logistik', 'no_nota_retur_barang')->ignore($id), // Abaikan ID jika sedang update
                'string',
                'regex:/^[A-Z0-9]+$/',
                'min:8',
                'max:20'
            ],
            'tanggal'               => ['required', 'date'],
            'nama_toko'             => ['required', 'string', 'min:1', 'max:200'],
            'total_harga'           => ['required', 'string', 'min:1', 'max:20'],
            'jumlah_barang'         => ['required', 'string', 'min:1', 'max:20']
        ];
    }
}
