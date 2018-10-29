<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PromotionRequest extends FormRequest
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
            'description' => 'required|min:3|max:250',
            'discount' => 'required|integer|min:0|max:100',
            'start_at' => 'required',
            'end_at' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'description.required' => __('message.description'),
            'description.min' => __('message.descrip_promotion_min'),
            'description.max' => __('message.descrip_promotion_max'),
            'discount.required' => __('message.discount'),
            'discount.integer' => __('message.discount_integer'),
            'discount.min' => __('message.discount_min'),
            'discount.max' => __('message.discount_max'),
            'start_at.required' => __('message.start_at'),
            'end_at.required' => __('message.end_at'),
        ];
    }
}
