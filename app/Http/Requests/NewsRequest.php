<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Adjust as necessary for your authorization logic
    }

    public function rules()
    {
        return [
            'headline' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'text' => 'required|string',
        ];
    }
}
