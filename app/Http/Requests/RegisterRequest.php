<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'required|string|unique:users,email|email:rfc,dns|max:255',
            'password' => 'required|min:8|max:255'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => '名前は入力必須です。',
            'name.max' => '255文字以内で入力してください。',
            'email.required' => 'メールアドレスの入力は必須です。',
            'email.string' => 'メールアドレスは文字列で入力してください。',
            'email.unique' => 'そのメールアドレスは既に使われています。',
            'email.email' => '正しいメールアドレスの形で入力してください。',
            'email.max' => 'メールアドレスは255文字以内で入力してください。',
            'password.required' => 'パスワードは入力必須です。',
            'password.min' => 'パスワードは8文字以上で入力してください。',
            'password.max' => 'パスワードは255文字以内で入力してください。'
        ];
    }
}
