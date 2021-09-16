<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'first_name' => 'required|min:2',
            'middle_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'email' => ['required', 'email', 'min:8', 'max:255'],
            'contact_number' => 'required|min:9',
            'department_id' => 'required|integer',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:5048|nullable'
        ];
    }
}
