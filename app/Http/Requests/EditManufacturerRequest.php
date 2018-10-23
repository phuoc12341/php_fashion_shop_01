<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditManufacturerRequest extends FormRequest
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
            'name' => 'required|min:3|max:100|unique:manufacturers,name,' . $this->id,
            'country' => 'required|min:3|max:100',
            'description' => 'required|min:50|max:500',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('message.name_required'),
            'name.min' => trans('message.name_min'),
            'name.max' => trans('message.name_max'),
            'name.unique' => trans('message.name_unique'),
            'country.required' => trans('message.country_required'),
            'country.min' => trans('message.country_min'),
            'country.max' => trans('message.country_max'),
            'description.required' => trans('message.description'),
            'description.min' => trans('message.description_min'),
            'description.max' => trans('message.description_max'),
        ];       
    }
}
