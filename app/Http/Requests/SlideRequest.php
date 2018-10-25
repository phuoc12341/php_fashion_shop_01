<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlideRequest extends FormRequest
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
            'link' => 'required',
            'image' => 'required|image',
        ];
    }

    public function messages()
    {
        return [
            'link.required' => trans('message.link_required'),
            'image.required' => trans('message.image_required'), 
            'image.image' => trans('message.image_format'),
        ];       
    }
}
