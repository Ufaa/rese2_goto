<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
            'start_date' => 'required|after:today',
            'start_time' => 'required',
            'num_of_users' => 'required',
        ];
    }
    
    public function messages()
    {
        return [
            'start_date.required' => '日付を入力してください',
            'start_time.required' => '時間を入力してください',
            'num_of_users.required' => '人数を入力してください',
            'start_date.after' => '今日より後の日付を指定してください。',
        ];
    }
}
