<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddAdminRequest extends FormRequest
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
            'account_details' => ['required', 'unique:users', 'numeric', 'digits:10'],
            'bank_name' => ['required'],
            'account_name' => ['required'],
            'first_name' => ['required'],
            'last_name' => ['required'],
            'middle_name' => ['nullable'],
            'user_name' => ['required', 'unique:users,user_name'],
            'email' => ['required', 'unique:users'],
            'phone_number' => ['required', 'unique:users', 'numeric', 'digits:11'],
        ];
    }
}
