<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditReserveRequest extends FormRequest
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
            're_date' => ['required','after_or_equal:today'],
            're_time' => ['required'],
            're_num' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            're_date.required' => '予約日を入力してください。',
            're_date.after_or_equal' => '予約日は本日以降の日にちを入力してください。',
            're_time.required' => '予約時間を入力してください。',
            're_num.required' => '予約人数を入力してください。',
        ];
    }
}
