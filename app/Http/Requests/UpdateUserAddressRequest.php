<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserAddressRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'region' => 'nullable|string',
            'street' => 'nullable|required|string',
            'house' => 'nullable|required|string',
            'address_name' => 'nullable|required|string',
            'additional_info' => 'nullable|string',
        ];
    }
}
