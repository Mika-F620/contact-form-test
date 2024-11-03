@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection
@section('content')
    <section class="thanks">
      <div class="thanks__contents">
        <h2 class="thanks__title">お問い合わせありがとうございました</h2>
        <button class="contact__formItemBtnbg" onclick="location.href='{{ route('home') }}'">HOME</button>
      </div>
    </section>
@endsection