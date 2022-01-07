<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfilesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => [
                'required',
                'string',
                'max:255',
                'alpha_dash',
                Rule::unique('users', 'email')->ignore($this->id)
            ],
            'name' => ['required', 'string', 'max:255'],
            'avatar' => 'file',
            'email' => [
                'required', 'email', 'max:255',
                Rule::unique('users', 'username')->ignore($this->id)
            ],
            'password' => ['nullable', 'string', 'min:8'. 'max:255', 'confirmed ']
        ];
    }
}
