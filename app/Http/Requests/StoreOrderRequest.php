<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'delivery_method_id' => 'required|numeric|exists:delivery_methods,id',
            'payment_type_id' => 'required|numeric|exists:payment_types,id',
            'books.*' => 'required|array:book_id,stock_id,quantity',
            'comment' => 'nullable|string|max:500',
            'books.*.book_id' => 'required|numeric|exists:books,id',
            'books.*.stock_id' => 'nullable|numeric|exists:stocks,id',
            'books.*.quantity' => 'required|numeric|min:1',
        ];
    }
}
