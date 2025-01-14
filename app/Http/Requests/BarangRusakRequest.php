<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BarangRusakRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->hasRole('warehouse-retur') || auth()->user()->hasRole('admin-retur');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'quantity_pcs'                  => ['required', 'numeric', 'min:0', 'max:999999'],
            'quantity_carton'               => ['required', 'numeric', 'min:0', 'max:999999'],
            'tanggal_expired'               => ['required', 'date'],
            'tanggal_retur'                 => ['required', 'date'],
            'barang_id'                     => ['required', 'string', 'exists:barang,id'],
            'reasson_retur_id'              => ['required', 'string', 'exists:reasson_retur,id'],
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
