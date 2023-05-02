<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email' => 'required|email:rfc,dns|unique:users,email',
            'name' => 'required|min:4',
            'cep' => 'required|min:4',
            'address' => 'required|min:4',
            'number' => 'required|min:1',
            'neighborhood' => 'required|min:4',
            'city' => 'required|min:2',
            'state' => 'required|min:2',
            'phone' => 'required|min:4',
            'password' => 'required|min:8',
            'password-confirmation' => 'required|same:password',
            'checkbox' =>'checked'
        ];
    }
}