<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'student_id' => ['required' , 'unique:students' ,'max:10'],
            'name' => ['required'] ,
            'lastname' => ['required']
        ];
    }
    public function messages()
    {
       return [
           'student_id.required' => "Talaba ID sini kiritishingiz shart!" ,
           'name.required' => "Talaba Ismini  kiritishingiz shart!" ,
           'lastname.required' => "Talaba Familiyasini  kiritishingiz shart!" ,
       ];
    }
}
