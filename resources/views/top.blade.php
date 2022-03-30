<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">


    <!-- Styles -->
    <style>

        .header {
            background-color: bisque;
            position: fixed;
            width: 100%;
            top: 0;
            /*display: flex;*/
            /*z-index: 1000;*/
            height: 50px;
            text-align: right;
        }
        .links > a {
            color: #636b6f;
            padding: 10px 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
            border: 1px solid #000;
        }
        .welcome_name {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>

<div class="flex-center position-ref full-height">
    <div class="header">
        <div class="login-name">

        </div>
        @auth
            {{--名前表示--}}
            <div class="welcome_name">
                <div class="top-left">
                {{ Auth::user()->name_sei}}{{ Auth::user()->name_mei}}様
                </div>
                <div class="top-right links">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        ログアウト
                    </a>
                    <form id='logout-form' action={{ route('logout')}} method="POST" style="display: none;">
                    @csrf
                </div>
            </div>
        @endauth
        @guest
            <div class="top-right links">
                <a href="{{ url('/member') }}">新規会員登録</a>

                <a href="{{ route('login') }}">ログイン</a>
            </div>
        @endguest
    </div>

    <div class="content">

    </div>
</div>
</body>
</html>

