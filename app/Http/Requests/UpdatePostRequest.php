<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UpdatePostRequest extends FormRequest
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
        return [
            'title'=>['required','string', Rule::unique('posts')->ignore($this->route('post')),'min:4','max:255'],
            'image_url'=>['required','url','min:4','max:255'],
            'content'=>['required','string','unique:posts','min:20'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required'=>'The Title is necessary to create a new post!',
            'image_url.url'=>'The image field must be an active URL !',

        ];
    }
}
