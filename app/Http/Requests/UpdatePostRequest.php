<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
       return true; //return Auth::user()->can('update', $post); 
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
             'body' =>'required|string',
            'image' =>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             
        ];
    }
}
