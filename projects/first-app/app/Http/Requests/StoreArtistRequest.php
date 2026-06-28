<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class StoreArtistRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'min:3',
                'max:255'
            ],
            'bio' => [
                'required' ,
                'string',
                'min:3'
            ],
            'image' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,webp',
                'max:2048'
            ]
        ];
    }


    public function messages()
    {
        return [
            'name.max' => "Custom Messgae: Artist name is not maximum to 255",
            'bio.min' => "Custom Message: Bio name is not minimum to 3",
        ];
    }


    public function attributes()
    {
        return [
            'name' => 'artist name',
            'bio' => 'artist biography',
        ];
    }
}
