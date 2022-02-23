<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopcreateRequest extends FormRequest
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
            'name' => 'required|max:255|unique:shops',
            'area_id' => 'required',
            'genre_id' => 'required',
            'description' => 'required',
            'image_url' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '店舗名は入力必須です。',
            'name.max' => '255文字以内で入力してください。',
            'name.unique' => 'その店舗名は既に使われています。',
            'area_id.required' => 'エリアを選択してください。',
            'genre_id.required' => 'ジャンルを選択してください',
            'description.required' => '店舗の説明を入力してください。',
            'image_url.required' => '画像ジャンルを選択してください。',
        ];
    }
}
