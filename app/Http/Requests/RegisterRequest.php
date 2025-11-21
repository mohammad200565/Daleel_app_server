<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|unique:users',
            'profileImage' => 'nullable|url',
            'personId' => 'required|string|unique:users',
            'birthdate' => 'required|date',
            'password' => 'required|string|min:6|confirmed',
        ];
    }
}
