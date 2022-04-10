<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeePostRequest extends FormRequest
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
            'first_name' => 'required|string|max:256',
            'last_name' => 'required|string|max:256',
            'email' => 'required|email',
            'phone' => 'required|digits:9', // only 9 digit phone-number,
            'company' => 'required|exists:companies,id'
        ];
    }
}
