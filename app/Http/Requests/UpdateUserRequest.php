<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            // 'email' => 'required|string|email|max:255|unique:users,email',
            'email' => 'required|string|email|max:100|unique:users,email,' . $this->route('user'),
            'password' => 'required|string|min:6',
            // 'role_id' => 'required|array',
            // 'role_id.*' => 'required|integer|exists:roles,id',
            'role_id' => 'required|integer|exists:roles,id',
            // 'permission_id' => 'required|array',
            // 'permission_id.*' => 'required|integer|exists:permissions,id',
            'permission_id' => 'required|integer|exists:permissions,id',
        ];
    }
}
