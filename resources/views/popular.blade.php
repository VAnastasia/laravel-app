@extends('layouts.main')
@section('title')Популярное@endsection
@section('content')

    <section class="page__main page__main--popular">
        <div class="container">
            <h1 class="page__title page__title--popular">Популярное</h1>
        </div>
        <div class="popular container">
            @include('modules.filters')

            <div class="popular__posts">
                <article class="popular__post post">
                    <header class="post__header">
                        <h2>Заголовок поста</h2>
                    </header>
                    <div class="post__main">
                        <div class="post-photo__image-wrapper">
                            <img src="/img/coast.jpg" alt="Фото от пользователя" width="360" height="240">
                        </div>
                        <p>Текст поста</p>
                    </div>
                    <footer class="post__footer">
                        <div class="post__author">
                            <a class="post__author-link" href="#" title="Автор">
                                <div class="post__avatar-wrapper">
                                    <img class="post__author-avatar" src="/img/userpic-medium.jpg" alt="Аватар пользователя">
                                </div>
                                <div class="post__info">
                                    <b class="post__author-name">Имя пользователя</b>
                                    <time class="post__time" datetime="">дата</time>
                                </div>
                            </a>
                        </div>
                        <div class="post__indicators">
                            <div class="post__buttons">
                                <a class="post__indicator post__indicator--likes button" href="#" title="Лайк">
                                    <svg class="post__indicator-icon" width="20" height="17">
                                        <use xlink:href="#icon-heart"></use>
                                    </svg>
                                    <svg class="post__indicator-icon post__indicator-icon--like-active" width="20" height="17">
                                        <use xlink:href="#icon-heart-active"></use>
                                    </svg>
                                    <span>0</span>
                                    <span class="visually-hidden">количество лайков</span>
                                </a>
                                <a class="post__indicator post__indicator--comments button" href="#" title="Комментарии">
                                    <svg class="post__indicator-icon" width="19" height="17">
                                        <use xlink:href="#icon-comment"></use>
                                    </svg>
                                    <span>0</span>
                                    <span class="visually-hidden">количество комментариев</span>
                                </a>
                            </div>
                        </div>
                    </footer>
                </article>
            </div>
        </div>
    </section>
@endsection
