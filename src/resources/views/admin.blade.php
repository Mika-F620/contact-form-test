@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection
@section('btn')
    @if (Auth::check())
    <form class="header__loginLink" action="/logout" method="post">
      @csrf
      <button class="header__loginBtn">logout</button>
    </form>
    @endif
@endsection
@section('content')
  <section class="admin wrapper">
    <h2 class="sectionTitle">Admin</h2>

    <form class="admin__searchForm" action="{{ route('admin.search') }}" method="POST">
    @csrf
    <input class="admin__searchInput" type="text" name="query" placeholder="名前またはメールアドレスで検索">
    <div class="admin__searchDropdown">
      <select class="admin__searchSelect" name="gender">
          <option value="" selected>性別</option>
          <option value="全て">全て</option>
          <option value="男性">男性</option>
          <option value="女性">女性</option>
          <option value="その他">その他</option>
      </select>
    </div>
    <div class="admin__searchDropdown">
    <select class="admin__searchSelect" name="category_id">
        <option value="">お問い合わせの種類</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->content }}</option>
        @endforeach
    </select>
</div>
    <input class="admin__searchInput" type="date" name="date" placeholder="日付で検索">

    <button class="contact__formItemBtnbg admin__searchBtn" type="submit">検索</button>
    
    <!-- リセットボタン -->
    <button class="admin__searchReset" type="button" onclick="window.location='{{ route('admin.dashboard') }}'">リセット</button>
</form>

<!-- ページネーションリンク -->
<div class="admin__searchPagination">
    {{ $contacts->links() }}
</div>
  <div class="admin__tableWrapper">
    <!-- 検索フィルターやテーブル -->
    <table class="admin__table">
      <tr>
        <th class="admin__tableHeading">お名前</th>
        <th class="admin__tableHeading">性別</th>
        <th class="admin__tableHeading">メールアドレス</th>
        <th class="admin__tableHeading">お問い合わせの種類</th>
      </tr>
      @foreach ($contacts as $contact)
      <tr>
        <td class="admin__tableDetails">{{ $contact->last_name }} {{ $contact->first_name }}</td>
        <td class="admin__tableDetails">{{ $contact->gender }}</td>
        <td class="admin__tableDetails">{{ $contact->email }}</td>
        <td class="admin__tableDetails">
          {{ $contact->category->content ?? 'なし' }}
          <button onclick="openModal({{ $contact->id }})" class="admin__tableBtn">詳細</button>
        </td>
      </tr>
      @endforeach
    </table>
  </div>
    <!-- モーダルウィンドウ -->
    <div id="contactModal" class="admin__modal">
      <div class="adminModal__contents">
        <span class="adminModal__close" onclick="closeModal()">&times;</span>
        <table class="adminModal__table">
          <tr><th class="adminModal__tableHeading">お名前</th><td class="adminModal__tableDetails" id="modal-name"></td></tr>
          <tr><th class="adminModal__tableHeading">性別</th><td class="adminModal__tableDetails" id="modal-gender"></td></tr>
          <tr><th class="adminModal__tableHeading">メールアドレス</th><td class="adminModal__tableDetails" id="modal-email"></td></tr>
          <tr><th class="adminModal__tableHeading">電話番号</th><td class="adminModal__tableDetails" id="modal-tell"></td></tr>
          <tr><th class="adminModal__tableHeading">住所</th><td class="adminModal__tableDetails" id="modal-address"></td></tr>
          <tr><th class="adminModal__tableHeading">建物名</th><td class="adminModal__tableDetails" id="modal-building"></td></tr>
          <tr><th class="adminModal__tableHeading">お問い合わせの種類</th><td class="adminModal__tableDetails" id="modal-category"></td></tr>
          <tr><th class="adminModal__tableHeading">お問い合わせ内容</th><td class="adminModal__tableDetails" id="modal-detail"></td></tr>
        </table>
        <button class="adminModal__tableBtn" type="button" onclick="deleteContact()">削除</button>
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
@endsection