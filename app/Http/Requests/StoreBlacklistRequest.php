<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlacklistRequest extends FormRequest
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
            'name' => 'required|string',
            'id_number' => 'required|string',
            'phone_number' => 'required|string',
            'rate' => 'required|int|min:1|max:5',
            'reason' => 'required|string',
            'photo_one' => 'nullable|image',
            'photo_two' => 'nullable|image',
            'photo_three' => 'nullable|image',
            'photo_four' => 'nullable|image',
            'photo_five' => 'nullable|image',
            'photo_six' => 'nullable|image',

        ];
    }
}
