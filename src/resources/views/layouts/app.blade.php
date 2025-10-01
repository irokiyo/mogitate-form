<!DOCTYPE html> {{-- 全ページの共通部分のレイアウト--}}
<html lang="ja">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Mogitate</title>
        <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/common.css') }}" />{{-- 共通するcssはここに記載する--}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Gorditas&family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&family=Noto+Serif+JP:wght@200..900&family=Oleo+Script:wght@400;700&display=swap" rel="stylesheet">
        @yield('css'){{-- cssはそれぞれ違うから@yieldを使って異なるということを示す--}}
    </head>
    <body>
        {{-- ヘッダーは全ページ同じ--}}
        <header class="header">
            <div class="header__inner">
                <a class="header__logo" href="/">
                    Mogitate
                </a>
            </div>
        </header>
        <main>
            @yield('content'){{-- メインの章はそれぞれページによって異なるため@yieldを使用--}}
        </main>
    </body>

    </html>
