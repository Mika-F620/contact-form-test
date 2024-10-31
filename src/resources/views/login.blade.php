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
  <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
</head>
<body>
  <header class="header">
    <h1 class="header__title">FashionablyLate</h1>
  </header>
  <main>
    <section class="login">
      <div class="login__contents wrapper">
        <h2 class="sectionTitle">Login</h2>
        <form class="login__form">
          <div class="login__item">
            <label class="login__label" for="email">メールアドレス</label>
            <input class="login__input" type="email" class="" for="email" placeholder="例: test@example.com">
          </div>
          <div class="login__item">
            <label class="login__label" for="pass">パスワード</label>
            <input class="login__input" type="password" class="" for="pass" placeholder="例: coachtech1106">
          </div>
          <input class="contact__formItemBtnbg" type="submit" value="ログイン" />
        </form>
      </div>
    </section>
  </main>
</body>
</html>