<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlacklistRequest extends FormRequest
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
            'name' => 'sometimes|string',
            'id_number' => 'sometimes|string',
            'phone_number' => 'sometimes|string',
            'rate' => 'sometimes|int|min:1|max:5',
            'reason' => 'sometimes|string',
            'photos' => 'sometimes|array|min:1|max:6',
            'photos.*' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
