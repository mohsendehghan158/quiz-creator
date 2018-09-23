<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>وب سایت برگزاری آزمون آنلاین</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
          integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

</head>
<body>
<nav class=" rtl navbar navbar-expand-md navbar-dark bg-primary fixed-top">
    <a class="navbar-brand" href="{{route('home')}}">سامانه آزمون آنلاین</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item{{ Request::path() == '/' ? ' active' : '' }}">
                <a class="nav-link" href="{{route('home')}}">صفحه اصلی</a>
            </li>
            @guest
                <li class="nav-item {{ Request::path() == 'login' ? ' active' : '' }}">
                    <a class="nav-link" href="{{route('login')}}">ورود</a>
                </li>
                <li class="nav-item {{ Request::path() == 'register' ? ' active' : '' }}">
                    <a class="nav-link" href="{{route('user-register')}}">عضویت</a>
                </li>
            @endguest
            @auth
                <li class="nav-item {{ Request::path() == 'quizzes' ? ' active' : '' }}">
                    <a class="nav-link" href="{{route('front-quizzes')}}">مشاهده آزمون ها</a>
                </li>

            @endauth
        </ul>
        @auth
            <div class="dropdown">
                <img src="{{ \Illuminate\Support\Facades\Auth::user()->profile_picture ? asset("storage/images/".\Illuminate\Support\Facades\Auth::user()->profile_picture)  : asset('images/avatar.jpg') }}" class="rounded-circle" width="40" height="40">
                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                    <strong>
                    {{\Illuminate\Support\Facades\Auth::user()->name}}
                    </strong>
                    خوش آمدید
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{route('edit-user')}}">ویرایش پروفایل</a>
                    <a class="dropdown-item text-danger" href="{{route('logout')}}">خروج از حساب کاربری</a>
                </div>
            </div>

        @endauth
    </div>
</nav>
<div class="container rtl full-height" style="padding-top: 80px">
    @yield('content')
</div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
