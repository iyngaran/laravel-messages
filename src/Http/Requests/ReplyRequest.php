<?php


namespace Iyngaran\LaravelMessages\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReplyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'message' => 'required'

        ];
    }

    public function messages()
    {
        return [
            'message.required' => 'The message field is required'
        ];
    }
}
