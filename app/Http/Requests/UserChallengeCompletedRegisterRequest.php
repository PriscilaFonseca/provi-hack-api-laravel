<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserChallengeCompletedRegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [            
            'id_user' => 'required|integer',
            'id_challenge' => 'required|integer', 
            'description' => 'required|string|max:1000', 
            'used_techs' => 'required|string|max:250', 
            'link' => 'required|string|max:450',              
        ];
    }
}
