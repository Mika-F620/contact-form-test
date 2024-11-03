@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection
@section('content')
    <section class="contact wrapper">
      <h2 class="sectionTitle">Contact</h2>
      <form class="contact__form" action="{{ route('confirm.post') }}" method="post">
        @csrf
        <div class="contact__formItem">
          <label id="name" class="contact__formItemLabel">お名前<spna class="contact__formItemLabel--red">※</spna></label>
          <div class="contact__formItemDetails">
            <input type="text" name="last_name" class="contact__formItemInput" for="name" placeholder="例: 山田">
            <input type="text" name="first_name" class="contact__formItemInput" for="name" placeholder="例: 太郎">
          </div>
        </div>
        @error('last_name')
        <p class="form__error form__errorRight">{{ $message }}</p>
        @enderror
        @error('first_name')
        <p class="form__error form__errorRight">{{ $message }}</p>
        @enderror
        <div class="contact__formItem">
          <label id="gender" class="contact__formItemLabel">性別<spna class="contact__formItemLabel--red">※</spna></label>
          <div class="contact__formItemDetails">
            <div class="contact__formItemDetailsValue"><input type="radio" class="contact__formItemRadio" name="gender" value="男性" checked="checked">男性</div>
            <div class="contact__formItemDetailsValue"><input type="radio" class="contact__formItemRadio" name="gender" value="女性">女性</div>
            <div class="contact__formItemDetailsValue"><input type="radio" class="contact__formItemRadio" name="gender" value="その他">その他</div>
          </div>
        </div>
        @error('gender')
        <p class="form__error form__errorRight">{{ $message }}</p>
        @enderror
        <div class="contact__formItem">
          <label id="email" class="contact__formItemLabel">メールアドレス<spna class="contact__formItemLabel--red">※</spna></label>
          <div class="contact__formItemDetails">
            <input type="email" name="email" class="contact__formItemInput" for="email" placeholder="例: test@example.com">
          </div>
        </div>
        @error('email')
        <p class="form__error form__errorRight">{{ $message }}</p>
        @enderror
        <div class="contact__formItem">
          <label id="tel" class="contact__formItemLabel">電話番号<spna class="contact__formItemLabel--red">※</spna></label>
          <div class="contact__formItemDetails">
            <input type="tel" name="tell[]" class="contact__formItemInput" for="tel" placeholder="080">
            <p class="contact__formItemHyphen">-</p>
            <input type="tel" name="tell[]" class="contact__formItemInput" for="tel" placeholder="1234">
            <p class="contact__formItemHyphen">-</p>
            <input type="tel" name="tell[]" class="contact__formItemInput" for="tel" placeholder="5678">
          </div>
        </div>
        @error('tel')
        <p class="form__error form__errorRight">{{ $message }}</p>
        @enderror
        <div class="contact__formItem">
          <label id="address" class="contact__formItemLabel">住所<spna class="contact__formItemLabel--red">※</spna></label>
          <div class="contact__formItemDetails">
            <input type="text" name="address" class="contact__formItemInput" for="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3">
          </div>
        </div>
        @error('address')
        <p class="form__error form__errorRight">{{ $message }}</p>
        @enderror
        <div class="contact__formItem">
          <label id="building" class="contact__formItemLabel">建物名</label>
          <div class="contact__formItemDetails">
            <input type="text" name="building" class="contact__formItemInput" for="building" placeholder="例: 千駄ヶ谷マンション101">
          </div>
        </div>
        <div class="contact__formItem">
          <label id="" class="contact__formItemLabel">お問い合わせの種類<spna class="contact__formItemLabel--red">※</spna></label>
          <div class="contact__formItemDetails">
            <select name="category_id" class="contact__formItemSelect">
            <option value="">選択してください</option> <!-- 初期選択 -->
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->content }}</option>
            @endforeach
            </select>
          </div>
        </div>
        @error('category_id')
        <p class="form__error form__errorRight">{{ $message }}</p>
        @enderror
        <div class="contact__formItem">
          <label id="content" class="contact__formItemLabel">お問い合わせ内容<spna class="contact__formItemLabel--red">※</spna></label>
          <div class="contact__formItemDetails">
            <textarea name="detail" class="contact__formItemTextarea" for="content" placeholder="お問い合わせ内容をご記載ください"></textarea>
          </div>
        </div>
        @error('detail')
        <p class="form__error form__errorRight">{{ $message }}</p>
        @enderror
        <input type="submit" class="contact__formItemBtnbg" value="確認画面">
      </form>
    </section>
@endsection