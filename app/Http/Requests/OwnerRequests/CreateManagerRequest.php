<?php

namespace App\Http\Requests\OwnerRequests;

use Illuminate\Foundation\Http\FormRequest;

class CreateManagerRequest extends FormRequest
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
            'full_name' => 'bail|required|string',
            'email' => 'bail|required|email|unique:users,email',
            'phone' => 'bail|required|numeric|unique:users,phone_number',
            'password' => 'bail|required|min:8|confirmed',
            'password_confirmation' => 'bail|required|min:8',
            'location' => 'bail|required|string',
        ];
    }
}
