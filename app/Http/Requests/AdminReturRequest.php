<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class AdminReturRequest extends FormRequest
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
            'name'                      => ['required', 'string', 'max:255'],
            'username'                  => ['required', 'string', 'max:255'],
            'email'                     => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . ($this->user?->id ?: '')],
            'password'                  => [$this->isMethod('POST') ? 'required' : 'nullable', 'string', 'min:8', 'confirmed', Password::defaults()],
            'password_confirmation'     => [$this->isMethod('POST') ? 'required' : 'nullable', 'string', 'min:8'],
            'telepon'                   => ['required', 'string', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', 'max:15'],
            'foto'                      => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000', 'max:1048'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */

    public function messages(): array
    {
        return [
            'password.min'              => 'Kata sandi minimal harus 8 karakter.',
            'password.letters'          => 'Kata sandi harus mengandung huruf.',
            'password.mixed'            => 'Kata sandi harus mengandung setidaknya satu huruf besar dan satu huruf kecil.',
            'password.numbers'          => 'Kata sandi harus mengandung setidaknya satu angka.',
            'password.symbols'          => 'Kata sandi harus mengandung setidaknya satu simbol.',
            'password.uncompromised'    => 'Kata sandi yang dimasukkan telah terdeteksi dalam kebocoran data. Silakan pilih kata sandi yang berbeda.',
            'foto.image'                => 'File harus berupa gambar.',
            'foto.mimes'                => 'Format gambar harus jpeg, png, atau jpg.',
            'foto.dimensions'           => 'Ukuran gambar minimal 100x100 pixel dan maksimal 2000x2000 pixel.',
            'foto.max'                  => 'Ukuran file gambar maksimal 1MB.',
        ];
    }
}
