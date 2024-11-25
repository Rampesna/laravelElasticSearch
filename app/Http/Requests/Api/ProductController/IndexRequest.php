<?php

namespace App\Http\Requests\Api\ProductController;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
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
            'pageIndex' => 'required|integer|min:0',
            'pageSize' => 'required|integer|min:1|max:100',
        ];
    }
}
