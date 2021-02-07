<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:40',
            'email' => 'required|email',
            'password' => 'required',
            'user_type' => 'required|integer',
            'avatar' => 'required',
            'bio' => 'required',            
            'stacks' => 'required',
            'main_technology' => 'required',
            'linkedin' => 'string',
            'behance' => 'string',
            'github' => 'string',
            'stacks' => 'required',
            'main_technology' => 'required',
            'phone' => 'required',
            'state' => 'required',
            'medium' => 'string'
        ];
    }
}
