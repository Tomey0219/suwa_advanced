<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('ttl')</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>
<body>
    <nav class="header_nav nav" id="js-nav">
        @auth
            <div class="div_menu">
                <form class="form_menu_btn" action="/" method="get">
                @csrf
                    <button class="btn_menu">Home</button>
                </form>
                <form class="form_menu_btn" action="/logout" method="post">
                @csrf
                    <button class="btn_menu">Logout</button>
                </form>
                <form class="form_menu_btn" action="/mypage" method="post">
                @csrf
                    <button class="btn_menu" type="submit">Mypage</button>
                </form>
            </div>
        @endauth
        @guest
            <div class="div_menu">
                <form class="form_menu_btn" action="/" method="get">
                @csrf
                    <button class="btn_menu">Home</button>
                </form>
                <form class="form_menu_btn" action="/register" method="get">
                @csrf
                    <button class="btn_menu">Registration</button>
                </form>
                <form class="form_menu_btn" action="/login" method="get">
                @csrf
                    <button class="btn_menu">Login</button>
                </form>
            </div>
        @endguest
    </nav>
    <header>
        <div class="div_header">
            <div class="div_header_logo">
                <div class="hamburger" id="js-hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <h1 class="site_name">Rese</h1>
            </div>
            <div class="div_header_search">
                @yield('header_item')
            </div>
        </div>
    </header>

    <script>
        const ham = document.querySelector('#js-hamburger'); //js-hamburgerの要素を取得し、変数hamに格納
        const nav = document.querySelector('#js-nav'); //js-navの要素を取得し、変数navに格納

        ham.addEventListener('click', function () { //ハンバーガーメニューをクリックしたら
            ham.classList.toggle('active'); // ハンバーガーメニューにactiveクラスを付け外し
            nav.classList.toggle('active'); // ナビゲーションメニューにactiveクラスを付け外し
        });
    </script>

    <main class="main">
        @yield('content')
    </main>

</body>
</html>