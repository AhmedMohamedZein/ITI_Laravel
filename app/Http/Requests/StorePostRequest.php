<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => ['required' , 'max:30'],
            'description' => ['required' , 'max:255'],
            'content' => ['required'],
            'user_id' => ['required' , 'numeric'],
            'img_src' => ['mimes:jpg,bmp,png']
        ];
    }
}
