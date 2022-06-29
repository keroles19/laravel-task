<?php

namespace App\Http\Requests\Comapny;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'sometimes|required|max:255',
            'address'=>'sometimes|required|max:255',
            'file_upload'=>'sometimes|required|image|mimes:png,jpg,jpeg|max:1024',
        ];
    }
}
