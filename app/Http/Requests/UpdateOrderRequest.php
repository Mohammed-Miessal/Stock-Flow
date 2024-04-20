<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
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
            'date' => 'required|date|after_or_equal:today', // Ensure Date is required and is a valid date format
            'total' => 'required|numeric|min:0', // Ensure total is required, numeric, and greater than or equal to 0
            'status' => 'required|in:paid,unpaid,partial,declined', // Ensure status is required and one of the specified values           
        ];
    }
}
