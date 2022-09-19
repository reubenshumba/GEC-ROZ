<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRozRegisterRequest extends FormRequest
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
                'name' => 'required|min:3',
                'email' => 'required|email|regex:/(.+)@(.+)\.(.+)/i',
                'number' => 'required|numeric|digits:10',
                'address' => 'sometimes|min:3|max:250',
                'occupation' => 'sometimes|min:3|max:250',
                'maritalStatus' => 'required|not_in:-1',
                'saved' => 'required|not_in:-1',
                'church' => 'required|not_in:-1',
                'callMe' => 'required|not_in:-1',
        ];
    }
}
