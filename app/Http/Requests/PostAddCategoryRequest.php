<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostAddCategoryRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:categories|max:255',
            'gender' => 'required',
            'parent_category' => 'required',
            'priority' => 'required|Integer',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('message.name.required'),
            'name.unique' => __('message.name.unique'),
            'name.max' => __('message.name.max'),
            'gender.required' => __('message.gender.required'),
            'parent_category.required' => __('message.parent_category.required'),
            'priority.required' => __('message.priority.required'),
            'priority.Integer' => __('message.priority.Integer'),
        ];
    }
}
