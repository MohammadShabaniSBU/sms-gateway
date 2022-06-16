<?php

namespace App\Http\Requests;

use App\Rules\IRPhoneNumber;
use Illuminate\Foundation\Http\FormRequest;

class SendSmsRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'phone' => ['required', 'string', new IRPhoneNumber],
            'content' => ['required', 'string', 'max:4096'] 
        ];
    }
}