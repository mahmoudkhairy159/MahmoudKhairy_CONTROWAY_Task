<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRegistrationRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'emailDomain' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'confirmed', 'regex:/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[*.~!@#$%^&*()_+|}{:?>\,-=]).{8,20}$/'],
        ];
    }
}
