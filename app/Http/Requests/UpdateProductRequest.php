<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'price' => 'required',
            'image' => 'required|max:255',
            'description' => 'nullable|max:3000',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'This product must have a name!',
            'image.required' => 'This product must have an image!',
            'image.max' => 'The image length cannot be more than 255 characters!',
            'price.required' => 'This product must have a name!',
            'description.max' => 'The description length cannot be more than 3000 characters!',
        ];
    }
}
