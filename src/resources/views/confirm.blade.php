@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection
@section('content')
    <section class="confirm wrapper">
      <h2 class="sectionTitle">Confirm</h2>
      <form class="confirm__form" action="{{ route('thanks') }}" method="post">
        @csrf
        <table class="confirm__table">
          <tr class="confirm__tableLine">
            <th class="confirm__tableHeading">お名前</th>
            <td class="confirm__tableDetail">
              {{ $contact['last_name'] }} {{ $contact['first_name'] }}
            </td>
          </tr>
          <tr class="confirm__tableLine">
            <th class="confirm__tableHeading">性別</th>
            <td class="confirm__tableDetail">{{ $contact['gender'] }}</td>
          </tr>
          <tr class="confirm__tableLine">
            <th class="confirm__tableHeading">メールアドレス</th>
            <td class="confirm__tableDetail">{{ $contact['email'] }}</td>
          </tr>
          <tr class="confirm__tableLine">
            <th class="confirm__tableHeading">電話番号</th>
            <td class="confirm__tableDetail">{{ $contact['tell'] }}</td>
          </tr>
          <tr class="confirm__tableLine">
            <th class="confirm__tableHeading">住所</th>
            <td class="confirm__tableDetail">{{ $contact['address'] }}</td>
          </tr>
          <tr class="confirm__tableLine">
            <th class="confirm__tableHeading">建物名</th>
            <td class="confirm__tableDetail">{{ $contact['building'] }}</td>
          </tr>
          <tr class="confirm__tableLine">
            <th class="confirm__tableHeading">お問い合わせの種類</th>
            <td class="confirm__tableDetail">{{ $contact['category'] }}</td>
          </tr>
          <tr class="confirm__tableLine">
            <th class="confirm__tableHeading">お問い合わせ内容</th>
            <td class="confirm__tableDetail">{{ $contact['detail'] }}</td>
          </tr>
        </table>
        <div class="confirm__button">
          <button class="contact__formItemBtnbg confirm__submit" type="submit">送信</button>
          <a onclick="history.back();">修正</a>
        </div>
      </form>
    </section>
@endsection