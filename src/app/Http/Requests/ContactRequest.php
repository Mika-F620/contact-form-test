<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'gender' => ['required'],
            'email' => ['required', 'email', 'max:255'],
            // 各電話番号フィールドに4桁以下の数字のみ許可
            'tell.0' => ['required', 'regex:/^\d{1,4}$/'],  // 最初の部分 例: 080
            'tell.1' => ['required', 'regex:/^\d{1,4}$/'],  // 中間部分 例: 1234
            'tell.2' => ['required', 'regex:/^\d{1,4}$/'],  // 最後の部分 例: 5678
            'address' => ['required', 'string', 'max:255'],
            'building' => ['string', 'max:255'],
            'category_id' => ['required', 'exists:categories,id'],
            'detail' => ['required', 'string', 'max:120'],
        ];
    }
    public function messages()
    {
        return [
            'first_name.required' => '名を入力してください',
            'first_name.string' => '名を文字列で入力してください',
            'first_name.max' => '名を255文字以下で入力してください',

            'last_name.required' => '姓を入力してください',
            'last_name.string' => '姓を文字列で入力してください',
            'last_name.max' => '姓を255文字以下で入力してください',

            'gender.required' => '性別を選択してください',

            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスはメール形式で入力してください',
            'email.max' => 'メールアドレスを255文字以下で入力してください',

            'tell.0.required' => '電話番号を入力してください',
            'tell.1.required' => '電話番号を入力してください',
            'tell.2.required' => '電話番号を入力してください',

            'tell.0.regex' => '電話番号は5桁までの数字で入力してください',
            'tell.1.regex' => '電話番号は5桁までの数字で入力してください',
            'tell.2.regex' => '電話番号は5桁までの数字で入力してください',

            'address.required' => '住所を入力してください',
            'address.string' => '住所を文字列で入力してください',
            'address.max' => '住所を255文字以下で入力してください',

            'category_id.required' => 'お問い合わせの種類を選択してください',

            'detail.required' => 'お問い合わせ内容を入力してください',
            'detail.string' => 'お問い合わせ内容を文字列で入力してください',
            'detail.max' => 'お問合せ内容は120文字以内で入力してください',
        ];
    }
}
