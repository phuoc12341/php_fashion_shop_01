<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostEditCategoryRequest extends FormRequest
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
        $id = $this->route('id');
        return [
            'name' => 'required|max:255|unique:categories,name,' . $id,
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
