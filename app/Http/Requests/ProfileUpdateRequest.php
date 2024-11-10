<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'profile_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'cover_image' => ['nullable', 'image', 'mimes:jpg,png,jpeg,gif', 'max:2048'],
            'title' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'dateBirth' => ['nullable', 'date'],
            'partner' => ['nullable', 'string', 'max:255'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'profile_image.image' => 'The profile image must be a valid image file.',
            'cover_image.image' => 'The cover image must be a valid image file.',
            'title.max' => 'The title must not exceed 255 characters.',
            'description.max' => 'The description must not exceed 65535 characters.',
            'dateBirth.date' => 'The date of birth must be a valid date.',
            'partner.max' => 'The partner field must not exceed 255 characters.',
        ];
    }
}
