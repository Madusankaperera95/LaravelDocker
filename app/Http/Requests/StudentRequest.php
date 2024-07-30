<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{



    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

//    public function prepareForValidation()
//    {
//
//        $this->merge([
//            'name' => ucwords($this->name)
//        ]);
//    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|unique:students',
            'name' => 'required',
            'age' => 'required|integer',
            'grade' => 'required'
        ];
    }

//    public function failedValidation(Validator $validator)
//    {
//      //  abort(422,'Something went Wrong');
//    }

//    public function passedValidation()
//    {
//        $this->merge(['is_authorize' => true]);
//    }

//    public function attributes()
//    {
//       return [
//           'email' => 'email_address'
//       ];
//    }
//
//    public function messages()
//    {
//        return [
//            'email.unique' => 'The email must be unique',
//            'email.required' => 'The email must be Provide',
//        ];
//    }
}
