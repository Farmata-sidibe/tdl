<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;


class ListeRequest extends FormRequest
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

    public function rules():array
    {

        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'dateBirth' => ['nullable', 'date'],
            'partner' => ['nullable', 'string', 'max:255'],
            'cagnotte_id' => ['nullable|exists:cagnottes,id'],
            'user_id' => ['nullable|exists:users,id'],
        ];
    }
}

// Rule::unique(User::class)->ignore($this->user()->id)],
