<!DOCTYPE html> {{-- 全ページの共通部分のレイアウト--}}
<html lang="ja">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Mogitate</title>
        <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/common.css') }}" />{{-- 共通するcssはここに記載する--}}
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
