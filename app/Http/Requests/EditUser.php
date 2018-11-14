<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUser extends FormRequest
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
            'name' => 'required|max:100' . $id,
            'password' => 'required',
            'passwordAgain' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('message.name_required'),
            'name.max' => __('message.name_max'),
            'password.required' => __('password.required'),
            'passwordAgain.required' => __('passwordAgain.required'),
            'passwordAgain.same' => __('passwordAgain.same'),
        ];       
    }
}
