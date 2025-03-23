<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>605-11 Himochkin</title>
    <style>
        /* Фон всего тела страницы */
        body {
            background-color: #343a40; /* Цвет фона как у шапки (bg-dark) */
            color: #ffffff; /* Белый текст для контраста */
        }

        /* Стили для выпадающего меню */
        .dropdown-menu {
            background-color: #343a40; /* Цвет фона как у шапки (bg-dark) */
            border: none; /* Убираем границу */
        }

        /* Стили для элементов выпадающего меню */
        .dropdown-menu .dropdown-item {
            color: #ffffff; /* Белый текст */
            font-weight: bold; /* Жирный текст, как в шапке */
        }

        /* Стили для элементов выпадающего меню при наведении */
        .dropdown-menu .dropdown-item:hover {
            background-color: #495057; /* Цвет фона при наведении */
            color: #ffffff; /* Белый текст */
        }

        /* Стили для разделителя */
        .dropdown-divider {
            border-top: 1px solid #6c757d; /* Цвет разделителя */
        }

        /* Кастомные стили для кнопки выхода */
        .btn-outline-secondary {
            transition: all 0.3s ease; /* Плавное изменение стилей */
            border-width: 2px; /* Толщина обводки */
        }

        .btn-outline-secondary:hover {
            background-color: #6c757d; /* Серый фон при наведении */
            color: white; /* Белый текст при наведении */
            border-color: #6c757d; /* Цвет обводки при наведении */
        }

        /* Кастомные стили для кнопок */
        .btn-sm {
            padding: 0.25rem 0.5rem; /* Уменьшаем отступы для маленьких кнопок */
            font-size: 0.875rem; /* Уменьшаем размер шрифта */
        }

        /* Стили для таблиц */
        .table {
            color: #ffffff; /* Белый текст в таблицах */
            background-color: #495057; /* Темный фон для таблиц */
        }

        .table-striped-columns tbody tr:nth-of-type(odd) {
            background-color: #343a40; /* Чередующийся цвет строк */
        }

        /* Стили для карточек */
        .card {
            background-color: #495057; /* Темный фон для карточек */
            color: #ffffff; /* Белый текст в карточках */
        }

        /* Стили для пагинации */
        .pagination .page-link {
            background-color: #495057; /* Темный фон для пагинации */
            color: #ffffff; /* Белый текст */
            border-color: #6c757d; /* Цвет границы */
        }

        .pagination .page-item.active .page-link {
            background-color: #6c757d; /* Цвет активной страницы */
            border-color: #6c757d; /* Цвет границы */
        }

        /* Кастомные стили для текста подсказок */
        .form-text {
            color: #ffffff !important; /* Белый текст для подсказок */
        }

        .custom-help-text {
            color: #ffffff; /* Белый текст */
        }
    </style>
</head>
<body class="d-flex flex-column h-100">
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold text-white" href="#">Online tests</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link fw-bold text-white dropdown-toggle active" aria-current="page" data-bs-toggle="dropdown"
                       href={{url('test')}}>Тесты</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href={{url('test')}}>Все тесты</a></li>
                        <li><a class="dropdown-item" href={{url('test/create')}}>Создать тест</a></li>
                        {{--                        <li><hr class="dropdown-divider"></li>--}}
                    </ul>
                </li>
            </ul>
            @if(!Auth::user())
                <form class="d-flex" method="post" action={{url('auth')}}>
                    @csrf
                    <input class="form-control me-2" type="text" placeholder="Логин" name="email" aria-label="Логин"
                           value="{{ old('email') }}"/>
                    <input class="form-control me-2" type="password" placeholder="Пароль" name="password" aria-label="Пароль"
                           value="{{ old('password') }}"/>
                    <button class="btn btn-outline-success" type="submit">Войти</button>
                </form>
            @else
                <ul class="navbar-nav">
                    <a class="nav-link active" href="#"><i class="fa fa-user" style="font-size:20px;color:white;"></i>
                        <span>{{ Auth::user()->name }} {{ Auth::user()->lastname }}</span></a>
                    <a class="btn btn-outline-success my-2 my-sm-0" href="{{url('logout')}}">Выйти</a>
                </ul>
            @endif
        </div>
    </div>
</nav>
<main class="flex-shrink-0 px-3" style="margin-top: 80px;">
    @yield('content')
</main>
@include('error')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
