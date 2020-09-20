<?php


namespace Iyngaran\LaravelMessages\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'from_name' => 'required',
            'from_email' => 'required',
            'from_phone' => 'required',
            'message' => 'required'

        ];
    }

    public function messages()
    {
        return [
            'from_name.required' => 'The name field is required',
            'from_email.required' => 'The email field is required',
            'from_phone.required' => 'The message field is required',
            'message.required' => 'The message field is required'
        ];
    }
}
