<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreSongRequest extends FormRequest
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
            'title' => 'required|string|max:255',

            'duration' => [
                'required',
                // 'regex:/^\d{2}:\d{2}$/'
            ],

            'artist_id' => 'required|exists:artists,id',
            'album_id'  => 'required|exists:albums,id',
            'genre_id'  => 'required|exists:genres,id',

            'audio_path' => [
                'required',
                'file',
                'mimes:mp3,mp4,wav,ogg',
                'max:5120', //5MB
            ],

            'cover_image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048', //2MB
            ],
        ];
    }
}
