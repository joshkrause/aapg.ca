<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConferenceRegistrationRequest extends FormRequest
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
        $rules = [
			'name' => 'required',
			'email' => 'required|email',
			'company' => 'required',
			'phone' => 'required',
		];

		for ($i = 0; $i < count($this->ticket); $i++)
		{
			$rules['ticket.' . $i] = 'required';
			$rules['registrant.'.$i] = 'required';
			$rules['meal.' . $i] = 'sometimes';
		}

		return $rules;
    }
}
