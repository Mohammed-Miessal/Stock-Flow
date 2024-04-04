<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSupplierRequest extends FormRequest
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
        $supplierId = $this->supplier->id; // get the supplier id
    
        return [
            'name' => 'required|string|max:255|unique:suppliers,name,' . $supplierId,
            'email' => 'required|email|unique:suppliers,email,' . $supplierId,
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'status' => 'required|string|in:active,inactive',
            'country' => 'required|string|max:255|unique:suppliers,country,' . $supplierId,
            'city' => 'required|string|max:255|unique:suppliers,city,' . $supplierId,
        ];
    }
    
}
