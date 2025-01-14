<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
}
