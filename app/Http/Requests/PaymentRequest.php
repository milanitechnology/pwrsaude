<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'users_id' => 'required|min:1',
            'payment_form' => 'required|min:1',
            'name' => 'required|min:1',
            'number' => 'required|min:1',
            'cvc' => 'required|min:1',
            'expiration_month' => 'required|min:1',
            'expiration_year' => 'required|min:1',
        ];
    }
}