<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class UpdateProfileRequest extends FormRequest
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
           'first_name' => 'string|max:255|unique:users,first_name,{$this->user->id}"',
            'last_name' =>'string|max:255',
             'avatar' => 'required|image',
             'email' => 'string|required|max:255|email|unique:users,email,{$this->user->id}"',
             'password'=> 'string|required|min:8|max:255|confirmed',
             'bio'=> 'required|max:1000'
           
               
        ];
    }
}
