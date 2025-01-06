<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;

class ReviewRequest extends FormRequest
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
            'shopID' => ['required'],
            'review' => ['required'],
            'comment' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'review.required' => '・星の数を入力してください。',
            'comment.required' => '・コメントを入力してください。',
        ];
    }
}
