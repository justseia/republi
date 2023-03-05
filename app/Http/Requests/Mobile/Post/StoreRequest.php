<?php

namespace App\Http\Requests\Mobile\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'string',
            'body' => 'string',
            'image' => 'string',
            'user_id' => '',
            'category_id' => '',
            'additional_data' => '',
        ];
    }
}