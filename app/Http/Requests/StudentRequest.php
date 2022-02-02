<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'name' => 'required',
            'age' => 'required|integer',
            'birth' => 'required | date',
            'mail' => 'required',
            'tel' => 'required',
            'plan' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '名前は必須項目です。',
            'age.required' => '年齢は必須項目です。',
            'age.ineger' => '数字を入力してください',
            'birth.required' => '生年月日は必須項目です。',
            'mail.required' => 'e-mailは必須項目です。',
            'tel.required' => 'TELは必須項目です。',
            'plan.required' => 'プラン名は必須項目です。',
        ];
    }
}
