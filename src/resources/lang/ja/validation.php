<?php

// resources/lang/ja/validation.php

return [
  'required' => ':attributeを入力してください。',
  'max' => [
      'string' => ':attributeは:max文字以下で入力してください。',
  ],
  'min' => [
      'string' => ':attributeは:min文字以上で入力してください。',
  ],
  'email' => ':attributeは正しいメールアドレス形式で入力してください。',
  'string' => ':attributeは文字列で入力してください。',
  'unique' => ':attributeは既に使用されています。',
  'confirmed' => ':attributeが確認欄と一致しません。',
  'exists' => '選択した:attributeは無効です。',
  
  // カスタム属性名
  'attributes' => [
      'name' => 'お名前',
      'email' => 'メールアドレス',
      'password' => 'パスワード',
      'first_name' => '名',
      'last_name' => '姓',
      'gender' => '性別',
      'tell' => '電話番号',
      'address' => '住所',
      'building' => '建物名',
      'category_id' => 'お問い合わせの種類',
      'detail' => 'お問い合わせ内容',
  ],
];
