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
            'nama_barang'                   => ['required', 'string', 'max:200'],
            'barcode'                       => ['required', 'string', 'max:100'],
            'quantity_pcs'                  => ['required', 'numeric', 'min:0', 'max:999999'],
            'quantity_carton'               => ['required', 'numeric', 'min:0', 'max:999999'],
            'tanggal_expired'               => ['required', 'date'],
            'tanggal_retur'                 => ['required', 'date'],
            'reasson_retur_id'              => ['required', 'string', 'exists:reasson_retur,id'],
            'user_id'                       => ['sometimes', 'string', 'exists:users,id'],
        ];
    }
}
