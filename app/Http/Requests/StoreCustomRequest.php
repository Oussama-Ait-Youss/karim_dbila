<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomRequest extends FormRequest
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
            'description' => ['required', 'string'],
            'requested_height' => ['nullable', 'numeric', 'min:0'],
            'requested_diameter' => ['nullable', 'numeric', 'min:0'],
            'clay_type' => ['nullable', 'string', 'max:255'],
            'glaze_type' => ['nullable', 'string', 'max:255'],
            'sketch_image' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:5120'], // 5MB max
        ];
    }
}
