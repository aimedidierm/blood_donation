<?php

namespace App\Http\Requests;

use App\Enums\UserSex;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use ReflectionClass;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string',
            'phone' => ['required', 'string', 'unique:users,phone', 'regex:/^07[8|9|3|2][0-9]{7}$/'],
            'gender' => ['required', 'string', Rule::in(array_values((new ReflectionClass(UserSex::class))->getConstants()))],
            'email' => 'required|email|unique:users,email',
            'kg' => 'required|numeric',
            'times' => 'required|numeric',
            'health' => 'required|string',
            'password' => 'required|string|confirmed',
            'password_confirmation' => 'required|string',
        ];
    }
}
