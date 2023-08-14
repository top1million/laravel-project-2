<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Validations extends FormRequest
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
            'model' => 'required',
            'color' => 'required',
            'price' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'model.required' => 'model is required',
            'color.required' => 'color is required',
            'price.required' => 'price is required',
        ];
    }
}
