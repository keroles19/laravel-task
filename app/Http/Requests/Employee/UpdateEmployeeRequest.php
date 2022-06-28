<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'sometimes|required|max:255',
            'email'=>'sometimes|email|unique:employees,email,'.$this->email,
            'password'=>'sometimes|required|confirmed',
            'logo'=>'sometimes:mimes:png,jpg,giv|max:1024',
            'company_id'=>'sometimes|exists:companies,id'
        ];
    }
}
