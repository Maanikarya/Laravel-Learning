<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreSongsRequest extends FormRequest
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
            'album_id' => [
                'required',
                'exists:album,id'
            ],
            'genre_id' => [
                'required',
                'exists:genre,id'
            ],
            'title' => [
                'required',
                'string',
                'max:255'
            ],
            'audio_path' => [
                'required',
                'mimes:mp3,mp4',
                'max:1024',
            ],
            'cover_image' => [
                'nullable',
                'mimes:jpg,jpeg,png',
                'max:1024',
            ]
        ];
    }
}
