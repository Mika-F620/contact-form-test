@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection
@section('content')
    <section class="register">
      <div class="register__contents wrapper">
        <h2 class="sectionTitle">Register</h2>
        <form class="register__form" action="{{ route('register.store') }}" method="post">
          @csrf
          <div class="register__item">
            <label class="register__label" for="name">お名前</label>
            <input class="register__input" type="text" name="name" class="" for="name" placeholder="例: 山田　太郎" value="{{ old('name') }}">
            <div class="form__error">
              @error('name')
              <p class="form__error">{{ $message }}</p>
              @enderror
            </div>
          </div>
          <div class="register__item">
            <label class="register__label" for="email">メールアドレス</label>
            <input class="register__input" type="email" name="email" class="" for="email" placeholder="例: test@example.com" value="{{ old('email') }}">
            <div class="form__error">
              @error('email')
              <p class="form__error">{{ $message }}</p>
              @enderror
            </div>
          </div>
          <div class="register__item">
            <label class="register__label" for="pass">パスワード</label>
            <input class="register__input" type="password" name="password" class="" for="pass" placeholder="例: coachtech1106" value="{{ old('password') }}">
            <div class="form__error">
              @error('password')
              <p class="form__error">{{ $message }}</p>
              @enderror
            </div>
          </div>
          <input class="contact__formItemBtnbg" type="submit" value="登録" />
        </form>
        @if (session('status'))
          <p>{{ session('status') }}</p>
        @endif
      </div>
    </section>
@endsection