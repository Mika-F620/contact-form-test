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
      <form class="" action="/thanks" method="post">
        @csrf
        <table class="confirm__table">
          <tr class="confirm__tableLine">
            <th class="confirm__tableHeading">お名前</th>
            <td class="confirm__tableDetail">
              <input type="text" name="lastname" value="{{ $contact['lastname'] }}" readonly>
              <input type="text" name="firstname" value="{{ $contact['firstname'] }}" readonly>
            </td>
          </tr>
          <tr class="confirm__tableLine">
            <th class="confirm__tableHeading">性別</th>
            <td class="confirm__tableDetail"><input type="text" name="gender" value="{{ $contact['gender'] }}" readonly></td>
          </tr>
          <tr class="confirm__tableLine">
            <th class="confirm__tableHeading">メールアドレス</th>
            <td class="confirm__tableDetail"><input type="email" name="email" value="{{ $contact['email'] }}" readonly></td>
          </tr>
          <tr class="confirm__tableLine">
            <th class="confirm__tableHeading">電話番号</th>
            <td class="confirm__tableDetail">
              <input type="tel" name="telfirst" value="{{ $contact['telfirst'] }}" readonly>
              <input type="tel" name="telmiddle" value="{{ $contact['telmiddle'] }}" readonly>
              <input type="tel" name="tellast" value="{{ $contact['tellast'] }}" readonly>
            </td>
          </tr>
          <tr class="confirm__tableLine">
            <th class="confirm__tableHeading">住所</th>
            <td class="confirm__tableDetail"><input type="text" name="address" value="{{ $contact['address'] }}" readonly></td>
          </tr>
          <tr class="confirm__tableLine">
            <th class="confirm__tableHeading">建物名</th>
            <td class="confirm__tableDetail"><input type="text" name="building" value="{{ $contact['building'] }}" readonly></td>
          </tr>
          <tr class="confirm__tableLine">
            <th class="confirm__tableHeading">お問い合わせの種類</th>
            <td class="confirm__tableDetail"><input type="text" name="kinds" value="{{ $contact['kinds'] }}" readonly></td>
          </tr>
          <tr class="confirm__tableLine">
            <th class="confirm__tableHeading">お問い合わせ内容</th>
            <td class="confirm__tableDetail"><input type="text" name="content" value="{{ $contact['content'] }}" readonly></td>
          </tr>
        </table>
        <div class="confirm__button">
          <button class="contact__formItemBtnbg confirm__submit" type="submit">送信</button>
          <a class="confirm__fix" href="#">修正</a>
        </div>
      </form>
    </section>
  </main>
</body>
</html>