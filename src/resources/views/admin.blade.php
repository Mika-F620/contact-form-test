<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お問い合わせフォーム</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
  <style>
    /* モーダルのスタイル */
    .modal {
      display: none; /* 初期は非表示 */
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
    }
    .modal-content {
      background-color: #fefefe;
      margin: 15% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
      max-width: 500px;
    }
    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <header class="header">
    <h1 class="header__title">FashionablyLate</h1>
    @if (Auth::check())
    <form class="form" action="/logout" method="post">
      @csrf
      <button class="header-nav__button">ログアウト</button>
    </form>
    @endif
  </header>
  <section class="admin wrapper">
    <h2 class="sectionTitle">Admin</h2>

    <!-- 検索フィルターやテーブル -->
    <table>
      <tr>
        <th>お名前</th>
        <th>性別</th>
        <th>メールアドレス</th>
        <th>お問い合わせの種類</th>
      </tr>
      @foreach ($contacts as $contact)
      <tr>
        <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
        <td>{{ $contact->gender }}</td>
        <td>{{ $contact->email }}</td>
        <td>
          {{ $contact->category->content ?? 'なし' }}
          <button onclick="openModal({{ $contact->id }})" class="contact__formItemBtnbg">詳細</button>
        </td>
      </tr>
      @endforeach
    </table>

    <!-- モーダルウィンドウ -->
    <div id="contactModal" class="modal">
      <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h3>お問い合わせ詳細</h3>
        <table>
          <tr><th>お名前</th><td id="modal-name"></td></tr>
          <tr><th>性別</th><td id="modal-gender"></td></tr>
          <tr><th>メールアドレス</th><td id="modal-email"></td></tr>
          <tr><th>電話番号</th><td id="modal-tell"></td></tr>
          <tr><th>住所</th><td id="modal-address"></td></tr>
          <tr><th>建物名</th><td id="modal-building"></td></tr>
          <tr><th>お問い合わせの種類</th><td id="modal-category"></td></tr>
          <tr><th>お問い合わせ内容</th><td id="modal-detail"></td></tr>
        </table>
        <button class="contact__formItemBtnbg" type="button">削除</button>
      </div>
    </div>
  </section>

  <script>
    // モーダルを開く関数
    function openModal(contactId) {
      const modal = document.getElementById("contactModal");

      fetch(`/contacts/${contactId}`)
        .then(response => response.json())
        .then(data => {
          document.getElementById("modal-name").textContent = data.last_name + ' ' + data.first_name;
          document.getElementById("modal-gender").textContent = data.gender;
          document.getElementById("modal-email").textContent = data.email;
          document.getElementById("modal-tell").textContent = data.tell;
          document.getElementById("modal-address").textContent = data.address;
          document.getElementById("modal-building").textContent = data.building;
          document.getElementById("modal-category").textContent = data.category.content ?? 'なし';
          document.getElementById("modal-detail").textContent = data.detail;

          modal.style.display = "block";
        });
    }

    // モーダルを閉じる関数
    function closeModal() {
      document.getElementById("contactModal").style.display = "none";
    }
  </script>
</body>
</html>
