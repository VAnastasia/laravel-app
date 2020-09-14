<header class="header">
    <div class="header__wrapper container">
    <div class="header__logo-wrapper">
        <a class="header__logo-link" href="/">
        <img class="header__logo" src="/img/logo.svg" alt="Логотип readme" width="128" height="24">
        </a>
        <p class="header__topic">
        micro blogging
        </p>
    </div>
    <form class="header__search-form form" action="#" method="get">
        <div class="header__search">
        <label class="visually-hidden">Поиск</label>
        <input class="header__search-input form__input" type="search">
        <button class="header__search-button button" type="submit">
            <svg class="header__search-icon" width="18" height="18">
            <use xlink:href="#icon-search"></use>
            </svg>
            <span class="visually-hidden">Начать поиск</span>
        </button>
        </div>
    </form>
    <div class="header__nav-wrapper">
        <nav class="header__nav">
        <ul class="header__my-nav">
            <li class="header__my-page header__my-page--popular">
            <a class="header__page-link" href="{{route('popular')}}" title="Популярный контент">
                <span class="visually-hidden">Популярный контент</span>
            </a>
            </li>
            <li class="header__my-page header__my-page--feed">
            <a class="header__page-link" href="feed.html" title="Моя лента">
                <span class="visually-hidden">Моя лента</span>
            </a>
            </li>
        </ul>
        <ul class="header__user-nav">
            @if($user ?? '')
            <li class="header__profile">
                <a class="header__profile-link" href="#">
                    <div class="header__avatar-wrapper">
                    <img class="header__profile-avatar" src="{{$user->avatar ? '/storage/' . $user->avatar : ''}}" alt="Аватар профиля">
                    </div>
                    <div class="header__profile-name">
                    <span>{{$user->name}}</span>
                    <svg class="header__link-arrow" width="10" height="6">
                        <use xlink:href="#icon-arrow-right-ad"></use>
                    </svg>
                    </div>
                </a>
                <div class="header__tooltip-wrapper">
                    <div class="header__profile-tooltip">
                    <ul class="header__profile-nav">
                        {{-- <li class="header__profile-nav-item">
                        <a class="header__profile-nav-link" href="#">
                            <span class="header__profile-nav-text">
                            Мой профиль
                            </span>
                        </a>
                        </li>
                        <li class="header__profile-nav-item">
                        <a class="header__profile-nav-link" href="#">
                            <span class="header__profile-nav-text">
                            Сообщения
                            <i class="header__profile-indicator">2</i>
                            </span>
                        </a>
                        </li> --}}
                        <li class="header__profile-nav-item">
                        <a class="header__profile-nav-link" href="{{route('logout')}}">
                            <span class="header__profile-nav-text">
                            Выход
                            </span>
                        </a>
                        </li>
                    </ul>
                    </div>
                </div>
            </li>
            <li>
                <a class="header__post-button button button--transparent" href="{{route('add')}}">Пост</a>
            </li>
            @else
            <li class="header__authorization">
                <a class="header__user-button @if(Route::current()->getName() === 'auth') header__user-button--active @endif header__authorization-button button" href="{{route('auth')}}">Вход</a>
            </li>
            <li>
                <a class="header__user-button @if(Route::current()->getName() === 'registration') header__user-button--active @endif header__register-button button" href="{{route('registration')}}">Регистрация</a>
            </li>
            @endif
        </ul>
        </nav>
    </div>
    </div>
</header>
