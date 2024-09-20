<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'title' => ['required', 'string', 'max:255', Rule::unique('news', 'title')->ignore($this->route('news'), 'slug')],
            'content' => ['required', 'string'],
            'images.*' => ['required', 'image', 'max:2048', 'mimes:jpeg,png,jpg,svg'],
        ];

        if ($this->isMethod('PUT')) {
            $rules['images.*'] = ['nullable', 'image', 'max:2048', 'mimes:jpeg,png,jpg,svg'];
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Judul wajib diisi.',
            'title.max' => 'Judul tidak boleh lebih dari 255 karakter.',
            'title.unique' => 'Judul berita ini sudah ada, silakan gunakan judul yang lain.',
            'content.required' => 'Konten wajib diisi.',
            'image.required' => 'Gambar wajib diisi.',
            'images.*.image' => 'Gambar harus berupa file gambar.',
            'images.*.mimes' => 'Gambar harus berupa file dengan ekstensi: jpeg, png, jpg, svg.',
            'images.*.max' => 'Gambar tidak boleh lebih dari 2MB.',
        ];
    }

    
}
