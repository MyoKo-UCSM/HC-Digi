<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class MemberRegisterFormRequest extends FormRequest
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
            'title'          => 'required',
            'name'           => 'required',
            'email'          => 'required|unique:members,email',
            'contact_number' => 'required',
            'institution'    => 'required',
            'password'       => 'required|min:6|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required'          => 'Please enter your title',
            'name.required'           => 'Please enter your name',
            'email.required'          => 'Please enter your email',
            'email.unique'            => 'Email is already created',
            'contact_number.required' => 'Please enter your contact number',
            'institution.required'    => 'Please enter your institution',
            'password.required'       => 'Please enter your password',
            'password.min'            => 'Password must be at least 6 characters',
            'password.confirmed'      => 'Password and confirm password must be the same',
        ];
    }
}
