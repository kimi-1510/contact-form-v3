@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="register__content">
    <div class="register-form__heading">
        <h2>Register</h2>
    </div>
    <form class="form" action="/register" method="post" novalidate>
        @csrf
        <div class="form__section">
            <!-- お名前入力欄 -->
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">お名前</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" name="name" value="{{ old('name') }}" />
                    </div>
                    <div class="form__error">
                        @error('name') {{ $message }} @enderror
                    </div>
                </div>
            </div>

            <!-- メールアドレス入力欄 -->
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">メールアドレス</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="email" name="email" value="{{ old('email') }}" />
                    </div>
                    <div class="form__error">
                        @error('email') {{ $message }} @enderror
                    </div>
                </div>
            </div>

            <!-- パスワード入力欄 -->
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">パスワード</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="password" name="password" />
                    </div>
                    <div class="form__error">
                        @error('password') {{ $message }} @enderror
                    </div>
                </div>
            </div>

            <!-- 登録ボタン -->
            <div class="form__button">
                <button class="form__button-submit" type="submit">登録</button>
            </div>
        </div>
@endsection
