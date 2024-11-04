@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection
@section('btn')
<div class="header__loginLink">
  <button class="header__loginBtn" onclick="location.href='{{ route('register') }}'">register</button>
</div>
@endsection
@section('content')
    @if (session('status'))
    <div class="registerSuccess">
        {{ session('status') }}
    </div>
    @endif
    <section class="login">
      <div class="login__contents wrapper">
        <h2 class="sectionTitle">Login</h2>
        <form class="login__form" action="{{ route('login') }}" method="post">
          @csrf
          <div class="login__item">
            <label class="login__label" for="email">メールアドレス</label>
            <input class="login__input" type="email" name="email" class="" for="email" placeholder="例: test@example.com">
            <div class="form__error">
              @error('email')
              <p class="form__error">{{ $message }}</p>
              @enderror
            </div>
          </div>
          <div class="login__item">
            <label class="login__label" for="pass">パスワード</label>
            <input class="login__input" type="password" name="password" class="" for="pass" placeholder="例: coachtech1106">
            <div class="form__error">
              @error('password')
              <p class="form__error">{{ $message }}</p>
              @enderror
            </div>
          </div>
          <input class="contact__formItemBtnbg" type="submit" value="ログイン" />
        </form>
      </div>
    </section>
@endsection