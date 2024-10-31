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
  <link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
</head>
<body>
  <header class="header">
    <h1 class="header__title">FashionablyLate</h1>
  </header>
  <main>
    <section class="confirm wrapper">
      <h2 class="sectionTitle">Confirm</h2>
      <table class="confirm__table">
        <tr class="confirm__tableLine">
          <th class="confirm__tableHeading">お名前</th>
          <td class="confirm__tableDetail">山田　太郎</td>
        </tr>
        <tr class="confirm__tableLine">
          <th class="confirm__tableHeading">性別</th>
          <td class="confirm__tableDetail">男性</td>
        </tr>
        <tr class="confirm__tableLine">
          <th class="confirm__tableHeading">メールアドレス</th>
          <td class="confirm__tableDetail">test@example.com</td>
        </tr>
        <tr class="confirm__tableLine">
          <th class="confirm__tableHeading">電話番号</th>
          <td class="confirm__tableDetail">08012345678</td>
        </tr>
        <tr class="confirm__tableLine">
          <th class="confirm__tableHeading">住所</th>
          <td class="confirm__tableDetail">東京都渋谷区千駄ヶ谷1-2-3</td>
        </tr>
        <tr class="confirm__tableLine">
          <th class="confirm__tableHeading">建物名</th>
          <td class="confirm__tableDetail">千駄ヶ谷マンション101</td>
        </tr>
        <tr class="confirm__tableLine">
          <th class="confirm__tableHeading">お問い合わせの種類</th>
          <td class="confirm__tableDetail">商品の交換について</td>
        </tr>
        <tr class="confirm__tableLine">
          <th class="confirm__tableHeading">お問い合わせ内容</th>
          <td class="confirm__tableDetail">届いた商品が注文した商品ではありませんでした。商品の取り替えをお願いします。</td>
        </tr>
      </table>
      <div class="confirm__button">
        <button class="contact__formItemBtnbg confirm__submit" type="submit">送信</button>
        <a class="confirm__fix" href="#">修正</a>
      </div>
    </section>
  </main>
</body>
</html>