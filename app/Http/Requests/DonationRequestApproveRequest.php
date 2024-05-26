<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonationRequestApproveRequest extends FormRequest
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
            'date' => 'required|date',
            'donations' => 'required|array',
            'donations.*.id' => 'required|integer|exists:donation_requests,id',
            'donations.*.user_id' => 'required|integer|exists:users,id',
            'donations.*.user_phone' => [
                'required',
                'string',
                'regex:/^(078|079|073|072)[0-9]{7}$/',
            ]
        ];
    }
}
