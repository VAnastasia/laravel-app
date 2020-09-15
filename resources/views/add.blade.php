@extends('layouts.main')
@section('title')Добавление поста@endsection
@section('content')

    <section class="page__main page__main--adding-post">
        <div class="page__main-section">
            <div class="container">
                <h1 class="page__title page__title--adding-post">Добавить пост</h1>
            </div>
            <div class="adding-post container">
                <h2 class="visually-hidden">Форма добавления поста</h2>
                <form class="adding-post__form form" action="{{route('post-submit')}}" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="form__text-inputs-wrapper">
                    <div class="form__text-inputs">
                      <div class="adding-post__input-wrapper form__input-wrapper">
                        <label class="adding-post__label form__label" for="photo-heading">Заголовок <span class="form__input-required">*</span></label>
                        <div class="form__input-section">
                          <input class="adding-post__input form__input" id="photo-heading" type="text" name="title" placeholder="Введите заголовок">
                        </div>
                      </div>
                      <div class="adding-post__textarea-wrapper form__textarea-wrapper">
                        <label class="adding-post__label form__label" for="post-text">Текст поста <span class="form__input-required">*</span></label>
                        <div class="form__input-section">
                          <textarea class="adding-post__textarea form__textarea form__input" id="post-text" name="description" placeholder="Введите текст публикации"></textarea>
                        </div>
                      </div>
                      <div class="adding-post__input-wrapper form__input-wrapper">
                        <label class="adding-post__label form__label" for="photo-tags">Теги</label>
                        <div class="form__input-section">
                          <input class="adding-post__input form__input" id="photo-tags" type="text" name="tags" placeholder="Введите теги">
                        </div>
                      </div>
                      <div class="adding-post__input-wrapper form__input-wrapper">
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
                  <div class="adding-post__buttons">
                    <button class="adding-post__submit button button--main" type="submit">Опубликовать</button>
                    <a class="adding-post__close" href="{{route('main')}}">Закрыть</a>
                  </div>
                </form>
            </div>
        </div>
    </section>
@endsection
