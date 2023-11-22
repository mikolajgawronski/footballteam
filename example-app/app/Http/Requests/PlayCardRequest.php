<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class PlayCardRequest extends FormRequest
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
            'clickable' => 'required|bool',
            'id' => 'required|integer',
            'name' => 'required|string|max:255',
            'image' => 'required|string',
            'power' => 'required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'clickable.required' => 'The clickable field is required.',
            'clickable.bool' => 'The clickable field must be true or false.',
            'id.required' => 'The id field is required.',
            'id.integer' => 'The id field must be an integer.',
            'name.required' => 'The name field is required.',
            'name.string' => 'The name field must be a string.',
            'name.max' => 'The name field must not be greater than 255 characters.',
            'image.required' => 'The image field is required.',
            'image.string' => 'The image field must be a string.',
            'power.required' => 'The power field is required.',
            'power.integer' => 'The power field must be an integer.',
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        $response = new Response(['errors' => $validator->errors()], 400);

        throw new ValidationException($validator, $response);
    }
}
