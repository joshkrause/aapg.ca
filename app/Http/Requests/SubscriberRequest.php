<?php

namespace App\Http\Requests;

use Alert;
use Illuminate\Foundation\Http\FormRequest;

class SubscriberRequest extends FormRequest
{
    public $validator = null;
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
            'name' => 'required',
            'email' => 'required|unique:subscribers,email',
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $this->validator = $validator;
    }

    public function withValidator($validator)
    {
        if($validator->fails()) {
            Alert::error($validator->errors(), 'Error!');
            return back();
        }
    }
}
