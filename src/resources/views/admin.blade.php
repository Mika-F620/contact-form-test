<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お問い合わせフォーム</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
</head>
<body>
  <header class="header">
    <h1 class="header__title">FashionablyLate</h1>
  </header>
  <section class="admin wrapper">
    <h2 class="sectionTitle">Admin</h2>
    <div>
      <input type="text">
      <select>
        <option>性別</option>
        <option>男性</option>
        <option>女性</option>
        <option>その他</option>
      </select>
      <select>
        <option>お問い合わせ</option>
        <option>商品の交換について</option>
        <option>種類2</option>
        <option>種類3</option>
      </select>
      <input type="date">
      <button class="contact__formItemBtnbg">検索</button>
      <button class="contact__formItemBtnbg">リセット</button>
    </div>
    <div>
      <button class="contact__formItemBtnbg">エクスポート</button>
    </div>
    <table>
      <tr>
        <th>お名前</th>
        <th>性別</th>
        <th>メールアドレス</th>
        <th>>お問い合わせの種類</th>
      </tr>
      <tr>
        <td>山田　太郎</td>
        <td>男性</td>
        <td>test@example.com</td>
        <td>商品の交換について<button class="contact__formItemBtnbg">詳細</button></td>
      </tr>
      <tr>
        <td>山田　太郎</td>
        <td>男性</td>
        <td>test@example.com</td>
        <td>商品の交換について<button class="contact__formItemBtnbg">詳細</button></td>
      </tr>
    </table>

    <div>
      <table>
        <tr>
          <th>お名前</th>
          <td>山田　太郎</td>
        </tr>
        <tr>
          <th>性別</th>
          <td>男性</td>
        </tr>
        <tr>
          <th>メールアドレス</th>
          <td>test@example.com</td>
        </tr>
        <tr>
          <th>電話番号</th>
          <td>08012345678</td>
        </tr>
        <tr>
          <th>住所</th>
          <td>東京都渋谷区</td>
        </tr>
        <tr>
          <th>建物名</th>
          <td>マンション</td>
        </tr>
        <tr>
          <th>お問い合わせの種類</th>
          <td>商品の交換について</td>
        </tr>
        <tr>
          <th>お問い合わせ内容</th>
          <td>テスト</td>
        </tr>
      </table>
      <button class="contact__formItemBtnbg" type="button">削除</button>
    </div>
  </section>
  <main>
  </main>
</body>
</html>