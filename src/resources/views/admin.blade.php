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

    .pagination-links {
    margin-top: 20px;
    display: flex;
    justify-content: center;
}

.pagination-links nav {
    display: inline-block;
}

.pagination-links .page-link {
    padding: 8px 12px;
    margin: 0 4px;
    background-color: #f2f2f2;
    border-radius: 4px;
    text-decoration: none;
}

.pagination-links .page-link:hover {
    background-color: #ddd;
}
  </style>
</head>
<body>
  <header class="header">
    <h1 class="header__title">FashionablyLate</h1>
    @if (Auth::check())
    <form class="header__loginLink" action="/logout" method="post">
      @csrf
      <button class="header__loginBtn">logout</button>
    </form>
    @endif
  </header>
  <section class="admin wrapper">
    <h2 class="sectionTitle">Admin</h2>

    <form action="{{ route('admin.search') }}" method="POST">
    @csrf
    <input type="text" name="query" placeholder="名前またはメールアドレスで検索">

    <select name="gender">
        <option value="" selected>性別</option>
        <option value="全て">全て</option>
        <option value="男性">男性</option>
        <option value="女性">女性</option>
        <option value="その他">その他</option>
    </select>

    <select name="category_id">
        <option value="">お問い合わせの種類</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->content }}</option>
        @endforeach
    </select>

    <input type="date" name="date" placeholder="日付で検索">

    <button type="submit">検索</button>
    
    <!-- リセットボタン -->
    <button type="button" onclick="window.location='{{ route('admin.dashboard') }}'">リセット</button>
</form>

<!-- ページネーションリンク -->
<div class="pagination-links">
    {{ $contacts->links() }}
</div>

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
        <button class="contact__formItemBtnbg" type="button" onclick="deleteContact()">削除</button>
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

    let selectedContactId;

function openModal(contactId) {
    const modal = document.getElementById("contactModal");
    selectedContactId = contactId; // モーダルを開く時にIDを保存

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

// 削除を実行する関数
function deleteContact() {
    if (!confirm('このデータを削除してもよろしいですか？')) return;

    fetch(`/contacts/${selectedContactId}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('削除しました。');
            closeModal();
            location.reload();  // ページをリロードして削除を反映
        } else {
            alert('削除に失敗しました。');
        }
    });
}

function closeModal() {
    document.getElementById("contactModal").style.display = "none";
}

  </script>
</body>
</html>
