@extends('layouts.main')
@section('title')Авторизация@endsection
@section('content')

    <main class="page__main page__main--registration">
        <div class="container">
            <h1 class="page__title page__title--registration">Авторизация</h1>
        </div>
        <section class="registration container">
            <h2 class="visually-hidden">Форма авторизации</h2>
            <form class="registration__form form" action="/auth/signin" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form__text-inputs-wrapper">
                <div class="form__text-inputs">

                    <div class="registration__input-wrapper form__input-wrapper">
                        <label class="registration__label form__label" for="registration-login">Email <span class="form__input-required">*</span></label>
                        <div class="form__input-section">
                        <input class="registration__input form__input" id="registration-login" type="text" name="email" placeholder="Введите email" value="{{Request::old('email') ?: ''}}">
                        </div>
                    </div>
                    <div class="registration__input-wrapper form__input-wrapper">
                        <label class="registration__label form__label" for="registration-password">Пароль<span class="form__input-required">*</span></label>
                        <div class="form__input-section">
                        <input class="registration__input form__input" id="registration-password" type="password" name="password" placeholder="Введите пароль">
                        </div>
                    </div>

                </div>
                @if($errors->any())
                    <div class="form__invalid-block">
                        <b class="form__invalid-slogan">Пожалуйста, исправьте следующие ошибки:</b>
                        <ul class="form__invalid-list">
                            @foreach($errors->all() as $error)
                                <li class="form__invalid-item">{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <button class="registration__submit button button--main" type="submit">Войти</button>
            </form>
        </section>
    </main>
@endsection
