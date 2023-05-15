<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use phpDocumentor\Reflection\Types\Nullable;

class SearchPropertyRequest extends FormRequest
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
            'surface' => ['numeric', 'gte:0', 'nullable'],
            'rooms' => ['numeric', 'gte:0', 'nullable'],
            'price' => ['numeric', 'gte:0', 'nullable'],
            'title' => ['string', 'nullable'],
        ];
    }
}
