@extends('layouts.main')
@section('title')Все посты@endsection
@section('content')

     <section class="page__main page__main--popular">
        <div class="container">
            <h1 class="page__title page__title--popular">Все посты</h1>
        </div>
        <div class="popular container">
            <div class="popular__posts">
                @foreach($posts as $post)
                {{-- {{dd($post)}} --}}
                    <a href="{{route('post', $post->id)}}">
                        <article class="popular__post post">
                            <header class="post__header">
                                <h2>{{$post->title}}</h2>
                            </header>
                            <div class="post__main">
                                <div class="post-photo__image-wrapper">
                                    <img src="/storage/{{$post->image}}" alt="Фото от пользователя" width="360" height="240" class="post-photo__image">
                                </div>
                                <p>{{strlen($post->description) > 512 ? mb_strimwidth($post->description, 0, 512) . '...' : $post->description}}</p>
                            </div>
                            <footer class="post__footer">
                                <div class="post__author">
                                    <a class="post__author-link" href="#" title="Автор">
                                        <div class="post__avatar-wrapper">
                                            <img class="post__author-avatar" src="/storage/{{$post->avatar}}" alt="Аватар пользователя">
                                        </div>
                                        <div class="post__info">
                                            <b class="post__author-name">{{$post->name}}</b>
                                            <time class="post__time" datetime="{{$post->updated_at}}">{{date_format(date_create($post->updated_at), 'd M Y H:i')}}</time>
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
                                            <span>{{!$post->like_count ? 0 : $post->like_count}}</span>
                                            <span class="visually-hidden">количество лайков</span>
                                        </a>
                                        <a class="post__indicator post__indicator--comments button" href="#" title="Комментарии">
                                            <svg class="post__indicator-icon" width="19" height="17">
                                                <use xlink:href="#icon-comment"></use>
                                            </svg>
                                            <span>{{!$post->comment_count ? 0 : $post->comment_count}}</span>
                                            <span class="visually-hidden">количество комментариев</span>
                                        </a>
                                    </div>
                                </div>
                            </footer>
                        </article>
                    </a>
                @endforeach

            </div>
        </div>
    </section>

@endsection
