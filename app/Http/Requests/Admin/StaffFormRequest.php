<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StaffFormRequest extends FormRequest
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
        // $password = ($this->getMethod() == "POST") ? 'required|min:6|confirmed' : '';

        // return [
        //     'password' => $password,
        // ];
        return [
            'name' => 'required',
        ];
    }

    public function messages(): array
    {
        // return [
        //     'password.min'  => 'Password must be at least 6 characters.',
        //     'password.confirmed' => 'Password and confirmation password must be the same.'
        // ];
        return [
            'name.required' => 'Name is required.',
        ];
    }
}
