<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <div class="header-utilities">
                <a class="header__logo" href="/">FashionablyLate</a>
                <nav>
                    <ul class="header-nav">
                        @if (Auth::check())
                            <li class="header-nav__item">
                                @if (request()->is('admin*')) <!-- 管理画面の場合 -->
                                    <form class="form" action="/logout" method="post">
                                        @csrf
                                        <button class="header-nav__button">ログアウト</button>
                                    </form>
                                @else
                                    <form class="form" action="/logout" method="post">
                                        @csrf
                                        <button class="header-nav__button">ログアウト</button>
                                    </form>
                                @endif
                            </li>
                        @else
                            <li class="header-nav__item">
                                @if (request()->is('login'))
                                    <a class="header-nav__button" href="/register">register</a>
                                @else
                                    <a class="header-nav__button" href="/login">Login</a>
                                @endif
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </header>


    <main>
        @yield('content')
    </main>
</body>

</html>
