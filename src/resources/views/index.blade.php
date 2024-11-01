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
  <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
</head>
<body>
  <header class="header">
    <h1 class="header__title">FashionablyLate</h1>
  </header>
  <main>
    <section class="contact wrapper">
      <h2 class="sectionTitle">Contact</h2>
      <form class="contact__form" action="/confirm" method="post">
        @csrf
        <div class="contact__formItem">
          <label id="name" class="contact__formItemLabel">お名前<spna class="contact__formItemLabel--red">※</spna></label>
          <div class="contact__formItemDetails">
            <input type="text" name="lastname" class="contact__formItemInput" for="name" placeholder="例: 山田">
            <input type="text" name="firstname" class="contact__formItemInput" for="name" placeholder="例: 太郎">
          </div>
        </div>
        <div class="contact__formItem">
          <label id="gender" class="contact__formItemLabel">性別<spna class="contact__formItemLabel--red">※</spna></label>
          <div class="contact__formItemDetails">
            <div class="contact__formItemDetailsValue"><input type="radio" class="contact__formItemRadio" name="gender">男性</div>
            <div class="contact__formItemDetailsValue"><input type="radio" class="contact__formItemRadio" name="gender">女性</div>
            <div class="contact__formItemDetailsValue"><input type="radio" class="contact__formItemRadio" name="gender">その他</div>
          </div>
        </div>
        <div class="contact__formItem">
          <label id="email" class="contact__formItemLabel">メールアドレス<spna class="contact__formItemLabel--red">※</spna></label>
          <div class="contact__formItemDetails">
            <input type="email" name="email" class="contact__formItemInput" for="email" placeholder="例: test@example.com">
          </div>
        </div>
        <div class="contact__formItem">
          <label id="tel" class="contact__formItemLabel">電話番号<spna class="contact__formItemLabel--red">※</spna></label>
          <div class="contact__formItemDetails">
            <input type="tel" name="telfirst" class="contact__formItemInput" for="tel" placeholder="080">
            <p class="contact__formItemHyphen">-</p>
            <input type="tel" name="telmiddle" class="contact__formItemInput" for="tel" placeholder="1234">
            <p class="contact__formItemHyphen">-</p>
            <input type="tel" name="tellast" class="contact__formItemInput" for="tel" placeholder="5678">
          </div>
        </div>
        <div class="contact__formItem">
          <label id="address" class="contact__formItemLabel">住所<spna class="contact__formItemLabel--red">※</spna></label>
          <div class="contact__formItemDetails">
            <input type="text" name="address" class="contact__formItemInput" for="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3">
          </div>
        </div>
        <div class="contact__formItem">
          <label id="building" class="contact__formItemLabel">建物名</label>
          <div class="contact__formItemDetails">
            <input type="text" name="building" class="contact__formItemInput" for="building" placeholder="例: 千駄ヶ谷マンション101">
          </div>
        </div>
        <div class="contact__formItem">
          <label id="" class="contact__formItemLabel">お問い合わせの種類<spna class="contact__formItemLabel--red">※</spna></label>
          <div class="contact__formItemDetails">
            <select name="kinds" class="contact__formItemSelect">
              <option value="">選択してください</option>
              <option value="商品の交換について">商品の交換について</option>
              <option value="種類2">種類2</option>
              <option value="種類3">種類3</option>
            </select>
          </div>
        </div>
        <div class="contact__formItem">
          <label id="content" class="contact__formItemLabel">お問い合わせ内容<spna class="contact__formItemLabel--red">※</spna></label>
          <div class="contact__formItemDetails">
            <textarea class="contact__formItemTextarea" for="content" placeholder="お問い合わせ内容をご記載ください"></textarea>
          </div>
        </div>
        <input type="button" class="contact__formItemBtnbg" value="確認画面">
      </form>
    </section>
  </main>
</body>
</html>