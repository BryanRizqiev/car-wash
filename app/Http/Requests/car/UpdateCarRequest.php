<?php

namespace App\Http\Requests\car;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCarRequest extends FormRequest
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
            'nopol' => ['required', 'string', 'min:4'],
            'car_colour' => ['required', 'string'],
            'price' => ['required', 'numeric', 'min:10000'],
            'customer_id' => ['required', 'string'],
        ];
    }
}
