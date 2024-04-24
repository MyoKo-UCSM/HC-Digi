<?php

namespace App\Http\Requests\Admin;

use App\Helpers\AdminHelper;
use Illuminate\Foundation\Http\FormRequest;

class BloodGroupFormRequest extends FormRequest
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
            'blood_group_name' => ['required', 'regex:/^[A-Za-z0-9\s]+$/'],
            'description'   => ['nullable', 'string', 'regex:/^[A-Za-z0-9\s]+$/'],
        ];
    }

    public function messages()
    {
        return [
            'blood_group_name.required' => 'Blood Group Name is required.',
        ];
    }
}
