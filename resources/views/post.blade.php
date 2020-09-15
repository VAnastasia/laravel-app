@extends('layouts.main')
@section('title') Посты @endsection
@section('content')
    <main class="page__main page__main--profile">
        <section class="profile__posts tabs__content tabs__content--active">
        <h2 class="visually-hidden">Публикации</h2>
        {{-- {{dd($posts)}} --}}
            <div class="profile__tab-content">
                @foreach($posts as $post)
                    <article class="profile__post post post-text">
                    <header class="post__header">
                    <div class="post__author">
                        <a class="post__author-link" title="Автор">
                        <img class="post__author-avatar" src="/storage/{{$post->avatar}}" alt="Аватар пользователя">
                        <div class="post__info">
                            <b class="post__author-name">{{$post->name}}</b>
                            <time class="post__time" datetime="{{$post->created_at}}">{{$post->created_at}}</time>
                        </div>
                        </a>
                    </div>
                    </header>
                    <div class="post__main">
                    <h2>{{$post->title}}</h2>
                    <div class="post-photo__image-wrapper">
                      <img src="/storage/{{$post->image}}" alt="Фото от пользователя" width="760" height="396">
                    </div>

                    <p>
                        {{$post->description}}
                    </p>

                    </div>
                    <footer class="post__footer">
                    <div class="post__indicators">
                        <div class="post__buttons">
                        <a class="post__indicator post__indicator--likes button" href="#" title="Лайк">
                            <svg class="post__indicator-icon" width="20" height="17">
                                <use xlink:href="#icon-heart"></use>
                            </svg>
                            <svg class="post__indicator-icon post__indicator-icon--like-active" width="20" height="17">
                                <use xlink:href="#icon-heart-active"></use>
                            </svg>
                            <span>{{!$post->like_count ? 0 : $post->like_count}}</span>
                            <span class="visually-hidden">количество лайков</span>
                        </a>
                        </div>
                    </div>
                    <ul class="post__tags">
                        <li><a href="#">#тэг1</a></li>
                        <li><a href="#">#тэг2</a></li>
                        <li><a href="#">#тэг3</a></li>
                        <li><a href="#">#тэг4</a></li>
                    </ul>
                    </footer>
                    <div class="comments">
                    <div class="comments__list-wrapper">
                        <ul class="comments__list">
                        <li class="comments__item user">
                            <div class="comments__avatar">
                            <a class="user__avatar-link">
                                <img class="comments__picture" src="" alt="Аватар пользователя">
                            </a>
                            </div>
                            <div class="comments__info">
                            <div class="comments__name-wrapper">
                                <a class="comments__user-name" href="#">
                                <span>Автор комментария</span>
                                </a>
                                <time class="comments__time" datetime="2019-03-20">Время комментария</time>
                            </div>
                            <p class="comments__text">
                                Комментарий
                            </p>
                            </div>
                        </li>
                        </ul>
                    </div>
                    </div>
                    <form class="comments__form form" action="#" method="post">
                    <div class="comments__my-avatar">
                        <img class="comments__picture" src="/storage/{{$user->avatar}}" alt="Аватар пользователя">
                    </div>
                    <textarea class="comments__textarea form__textarea" placeholder="Ваш комментарий"></textarea>
                    <label class="visually-hidden">Ваш комментарий</label>
                    <button class="comments__submit button button--green" type="submit">Отправить</button>
                    </form>
                </article>
                @endforeach

            </div>
        </section>

    </main>
@endsection
