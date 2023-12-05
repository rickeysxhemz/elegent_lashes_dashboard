<?php

namespace App\Http\Requests\OwnerRequests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateManagerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->hasRole('owner');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'full_name' => 'required|string',
            'email' => 'required|unique:users,email,' . $this->id,
            'phone' => 'required|numeric',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8',
            'location' => 'required|string',

        ];
        dd($this->id);
    }
}
