<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'image' => 'required|file|mimetypes:image/png,image/jpg,image/jpeg|image:jpg,png,jpeg',
            'name' => 'required|string',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|string|confirmed|min:8|max:16'
        ];
    }
}
