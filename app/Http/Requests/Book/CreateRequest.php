<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $default = [
            'name'        => ['required', 'string'],
            'slug'        => ['required', 'string', 'unique:books,slug'],
            'description' => ['required', 'string'],
            'cover_image' => ['required', 'mimes:jpeg,jpg,png', 'max:1000'],
            'book_pdf'    => ['required', 'mimes:pdf'],
        ];

        return auth()->user()->isAdmin ? ($default + ['status' => ['required', 'boolean']]) : $default;
    }
}
