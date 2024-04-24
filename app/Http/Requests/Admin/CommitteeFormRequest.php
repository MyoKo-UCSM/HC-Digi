<?php

namespace App\Http\Requests\Admin;

use App\Helpers\AdminHelper;
use Illuminate\Foundation\Http\FormRequest;

class CommitteeFormRequest extends FormRequest
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
            'title' => 'required',
            'name'  => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title is required.',
            'name.required'  => 'Name is required.',
        ];
    }

    public function withValidator($validator)
    {
        if (!is_null($this->image)) {
            $image_path = AdminHelper::storageFileExist($this->image);

            $validator->after(function ($validator) use ($image_path) {
                if (!$image_path) {
                    $validator->errors()->add('image', 'Invalid Image Path.');
                }
            });

            $this->merge([
                'image' => $image_path,
            ]);
        }
    }
}
