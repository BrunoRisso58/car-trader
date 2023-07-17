<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
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
        $email = $this->input('email');

        return [
            'image' => 'file|mimetypes:image/png,image/jpg,image/jpeg|image:jpg,png,jpeg',
            'name' => 'required|string',
            'email' => ['required', 'email', Rule::unique('users')->ignore($email, 'email')],
            'password' => 'required|string|confirmed|min:8|max:16'
        ];
    }
}
