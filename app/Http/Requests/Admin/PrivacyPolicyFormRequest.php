<?php

namespace App\Http\Requests\Admin;

use App\Helpers\AdminHelper;
use Illuminate\Foundation\Http\FormRequest;

class PrivacyPolicyFormRequest extends FormRequest
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
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Title is required.',
        ];
    }

    public function withValidator($validator)
    {
        if (!is_null($this->meta_image)) {
            $meta_image_path = AdminHelper::storageFileExist($this->meta_image);

            $validator->after(function ($validator) use ($meta_image_path) {
                if (!$meta_image_path) {
                    $validator->errors()->add('meta_image', 'Invalid Meta Image Path.');
                }
            });

            $this->merge([
                'meta_image' => $meta_image_path,
            ]);
        }
    }
}
