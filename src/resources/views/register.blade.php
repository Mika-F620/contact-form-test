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
  <link rel="stylesheet" href="{{ asset('css/register.css') }}" />
</head>
<body>
  <header class="header">
    <h1 class="header__title">FashionablyLate</h1>
  </header>
  <main>
    <section class="register">
      <div class="register__contents wrapper">
        <h2 class="sectionTitle">Register</h2>
        <form class="register__form">
          <div class="register__item">
            <label class="register__label" for="name">お名前</label>
            <input class="register__input" type="text" class="" for="name" placeholder="例: 山田　太郎">
          </div>
          <div class="register__item">
            <label class="register__label" for="email">メールアドレス</label>
            <input class="register__input" type="email" class="" for="email" placeholder="例: test@example.com">
          </div>
          <div class="register__item">
            <label class="register__label" for="pass">パスワード</label>
            <input class="register__input" type="password" class="" for="pass" placeholder="例: coachtech1106">
          </div>
          <input class="contact__formItemBtnbg" type="submit" value="登録" />
        </form>
      </div>
    </section>
  </main>
</body>
</html>