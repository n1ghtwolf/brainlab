<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'name'        => 'required|string|min:4',
            'email'       => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($this->admin)
            ],
            'password'    => 'nullable|string|min:4',
            'status'      => 'string|in:active,inactive',
            'avatar_path' => 'nullable|string',
        ];
    }
}
