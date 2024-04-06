<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
            'name' => 'required|string|max:255',
            'reference' => 'required|string|unique:products|max:255',
            'quantity' => 'required|integer|min:0', 
            'price' => 'required|numeric|min:0', 
            'status' => 'required|in:active,out of stock,archived,on pre-order',
            'critical_stock' => 'required|integer|min:0', 
            'category_id' => 'required|exists:categories,id', 
            'subcategory_id' => 'required|exists:subcategories,id', 
            'unit_id' => 'required|exists:units,id', 
            'tax_id' => 'required|exists:taxes,id', 
            'supplier_id' => 'required|exists:suppliers,id', 
        ];
    }
}
