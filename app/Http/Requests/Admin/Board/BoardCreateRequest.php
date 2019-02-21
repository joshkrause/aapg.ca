<?php

namespace App\Http\Requests\Admin\Board;

use Illuminate\Foundation\Http\FormRequest;

class BoardCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'community' => 'required|string',
            'position' => 'required|string',
            'bio' => 'required',
            'sort' => 'integer|nullable',
            'image' => 'file|image|nullable',
        ];
    }
}
