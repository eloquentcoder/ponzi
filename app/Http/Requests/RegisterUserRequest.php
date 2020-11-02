<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
            'first_name' => ['required'],
            'last_name' => ['required'],
            'middle_name' => ['nullable'],
            'username' => ['required', 'unique:users,user_name'],
            'email' => ['required', 'unique:users'],
            'phone_number' => ['required', 'unique:users', 'numeric'],
            'password' => ['required', 'min:8', 'confirmed']
        ];
    }
}
