<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel-app</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Fonts -->

        <!-- styles-->
        <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
        <!-- styles-->

    </head>
    <body>
        <div class="container">

            <nav class="navbar navbar-expand bg-light navbar-light">
                <div class="container-fluid">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link menu-link  "
                               href="#">Главная страница</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link "
                               href="#">Каталог статей</a>
                        </li>
                    </ul>
                    <a class="d-flex justify-content-end " href="https://github.com/dridosh/">
                        <i class="bi bi-github" style="font-size: 2rem; color: #000000;"></i>
                    </a>
                </div>
            </nav>
            <div class="hero" style="background-image: url(/img/susan-q-yin-2JIvboGLeho-unsplash_sm.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero__content text-center">
                                <div class="hero__content-tag">
                                    <a href="#">Разработчик PHP - Laravel - Vue.js</a>
                                </div>
                                <h2><a href="#">Тестовое задание</a></h2>

{{--                                <div class="hero__content-tag">--}}
{{--                                    <a href="#">rdb.com</a>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </body>
</html>
