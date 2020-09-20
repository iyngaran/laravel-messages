<?php


namespace Iyngaran\LaravelMessages\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Reply extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required'

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required',
            'email.required' => 'The email field is required',
            'message.required' => 'The message field is required'
        ];
    }
}
