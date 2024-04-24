<?php

namespace App\Http\Requests\Admin;

use App\Helpers\AdminHelper;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\NoDoubleDotExtension;

class EmployeeFormRequest extends FormRequest
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
            'name'          => ['required', 'regex:/^[A-Za-z0-9\s]+$/'],
            'employee_code' => ['nullable', 'regex:/^[A-Za-z0-9\s]+$/'],
            'email'         => ['required', 'email'],
            'position_id'   => 'required',
            'department_id' => 'required',
            'grade_id'      => 'required',
            'sub_department_id'=> 'required',
            'address'   => ['nullable', 'string', 'regex:/^[A-Za-z0-9\s]+$/'],
            'description'   => ['nullable', 'string', 'regex:/^[A-Za-z0-9\s]+$/'],
            'nrc_copy' => ['nullable', 'file', 'mimes:pdf,jpeg,png', new NoDoubleDotExtension],
            'labor_copy' => ['nullable', 'file', 'mimes:pdf,jpeg,png', new NoDoubleDotExtension],
            'family_registration_copy' => ['nullable', 'file', 'mimes:pdf,jpeg,png', new NoDoubleDotExtension],
            'certificate_copy' => ['nullable', 'file', 'mimes:pdf,jpeg,png', new NoDoubleDotExtension],
            'driving_license_copy' => ['nullable', 'file', 'mimes:pdf,jpeg,png', new NoDoubleDotExtension],
            'employee_photo' => ['nullable', 'file', 'jpeg,png', new NoDoubleDotExtension],
            
        ];
    }

    public function messages()
    {
        return [
            'name.required'      => 'Employee Name is required.',
            'email.required'     => 'Email is required.',
            'position_id.required'=> 'Position is required.',
            'department_id.required'=> 'Department is required.',
            'grade_id.required' => 'Job Grade is required.',
            'sub_department_id' => 'Team is required',
        ];
    }
}
