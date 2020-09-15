@extends('layouts.main')
@section('title')Регистрация@endsection
@section('content')

    <main class="page__main page__main--registration">
        <div class="container">
            <h1 class="page__title page__title--registration">Регистрация</h1>
        </div>
        <section class="registration container">
            <h2 class="visually-hidden">Форма регистрации</h2>
            <form class="registration__form form" action="{{route('registration-form')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form__text-inputs-wrapper">
                    <div class="form__text-inputs">
                    <div class="registration__input-wrapper form__input-wrapper">
                        <label class="registration__label form__label" for="registration-email">Электронная почта <span class="form__input-required">*</span></label>
                        <div class="form__input-section">
                            <input class="registration__input form__input" id="registration-email" type="email" name="email" placeholder="Укажите эл.почту" value="{{Request::old('email') ?: ''}}">
                        </div>
                    </div>
                    <div class="registration__input-wrapper form__input-wrapper">
                        <label class="registration__label form__label" for="registration-login">Логин <span class="form__input-required">*</span></label>
                        <div class="form__input-section">
                            <input class="registration__input form__input" id="registration-login" type="text" name="login" placeholder="Укажите логин" value="{{Request::old('login') ?: ''}}">
                        </div>
                    </div>
                    <div class="registration__input-wrapper form__input-wrapper">
                        <label class="registration__label form__label" for="registration-password">Пароль<span class="form__input-required">*</span></label>
                        <div class="form__input-section">
                        <input class="registration__input form__input" id="registration-password" type="password" name="password" placeholder="Придумайте пароль">
                        </div>
                    </div>
                    <div class="registration__input-wrapper form__input-wrapper">
                        <label class="registration__label form__label" for="registration-password-repeat">Повтор пароля<span class="form__input-required">*</span></label>
                        <div class="form__input-section">
                        <input class="registration__input form__input" id="registration-password-repeat" type="password" name="password-repeat" placeholder="Повторите пароль">
                        </div>
                    </div>
                    <div class="registration__input-wrapper form__input-wrapper">
                        <input type="file" name="image">
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
                <button class="registration__submit button button--main" type="submit">Отправить</button>
            </form>
        </section>
    </main>
@endsection
