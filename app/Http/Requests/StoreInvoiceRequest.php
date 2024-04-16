<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInvoiceRequest extends FormRequest
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
        return [
            'customer_id' => 'required|exists:customers,id', // Ensure customer_id is required and exists in the customers table
            'invoice_date' => 'required|date',
            'due_date' =>  'required|date',
            'total' => 'required|numeric|min:0', 
            // 'products' => ['required', 'array'],
            // 'products.*.id' => ['required', 'exists:products,id'],
            // 'products.*.quantity' => ['required', 'integer', 'min:1'],
        ];
    }
}
