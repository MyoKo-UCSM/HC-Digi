<?php

namespace App\Http\Requests\Admin;

use App\Helpers\AdminHelper;
use Illuminate\Foundation\Http\FormRequest;

class CategoryFormRequest extends FormRequest
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
            'category_name' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'category_name.required' => 'Category Name is required.',
        ];
    }

    // public function withValidator($validator)
    // {
    //     if (!is_null($this->banner_image) || !is_null($this->meta_image) || !is_null($this->thumbnail_image)) {
    //         $banner_image_path    = AdminHelper::storageFileExist($this->banner_image);
    //         $meta_image_path      = AdminHelper::storageFileExist($this->meta_image);
    //         $thumbnail_image_path = AdminHelper::storageFileExist($this->thumbnail_image);

    //         $validator->after(function ($validator) use ($banner_image_path, $meta_image_path, $thumbnail_image_path) {

    //             if (!$banner_image_path) {
    //                 $validator->errors()->add('banner_image', 'Invalid Banner Image Path.');
    //             }
    //             if (!$meta_image_path) {
    //                 $validator->errors()->add('meta_image', 'Invalid Meta Image Path.');
    //             }

    //             if (!$thumbnail_image_path) {
    //                 $validator->errors()->add('thumbnail_image', 'Invalid Thumbnail Image Path.');
    //             }

    //         });

    //         $this->merge([
    //             'banner_image'    => $banner_image_path,
    //             'meta_image'      => $meta_image_path,
    //             'thumbnail_image' => $thumbnail_image_path,
    //         ]);
    //     }
    // }
}
