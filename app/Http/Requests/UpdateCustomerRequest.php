<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $customerId = $this->customer->id; // get the customer id
    
        return [
            'name' => 'required|string|max:255|unique:customers,name,' . $customerId,
            'email' => 'required|email|unique:customers,email,' . $customerId,
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'country' => 'required|string|max:255' ,
            'city' => 'required|string|max:255' ,
        ];
    }
}
