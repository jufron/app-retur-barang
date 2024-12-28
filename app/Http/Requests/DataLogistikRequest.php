<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'tanggal'               => ['required', 'date'],
            'nama_toko'             => ['required', 'string', 'min:1', 'max:200'],
            'total_harga'           => ['required', 'numeric', 'min_digits:1', 'max_digits:20'],
            'jumlah_barang'         => ['required', 'integer', 'min_digits:1', 'max_digits:20']
        ];
    }
}
