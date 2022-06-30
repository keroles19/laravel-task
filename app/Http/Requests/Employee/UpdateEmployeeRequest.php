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
        return true;
    }


    public function rules()
    {
        return [
            'name'=>'sometimes|required|max:255',
            'email'=>'sometimes|required|email|unique:employees,email,'.$this->employee,
            'file_upload'=>'sometimes|required|image|mimes:png,jpg,jpeg|max:1024',
            'company_id'=>'sometimes|required|exists:companies,id'
        ];
    }
}
