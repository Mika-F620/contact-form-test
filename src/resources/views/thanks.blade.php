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
  <link rel="stylesheet" href="{{ asset('css/thanks.css') }}" />
</head>
<body>
  <main>
    <section class="thanks">
      <div class="thanks__contents">
        <h2 class="thanks__title">お問い合わせありがとうございました</h2>
        <button class="contact__formItemBtnbg" onclick="location.href='{{ route('home') }}'">HOME</button>
      </div>
    </section>
  </main>
</body>
</html>