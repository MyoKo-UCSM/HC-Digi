<?php

namespace App\Http\Requests\Admin;

use App\Helpers\AdminHelper;
use Illuminate\Foundation\Http\FormRequest;

class SubDepartmentFormRequest extends FormRequest
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
            'sub_department_name' => ['required', 'regex:/^[A-Za-z0-9\s]+$/'],
            'department_id' => ['required'],
            'description'   => ['nullable', 'string', 'regex:/^[A-Za-z0-9\s]+$/'],
        ];
    }

    public function messages()
    {
        return [
            'sub_department_name.required' => 'Team Name is required.',
            'department_id.required' => 'Department is required.',
        ];
    }
}
