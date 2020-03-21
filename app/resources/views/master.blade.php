<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/sketchy/bootstrap.min.css" rel="stylesheet" integrity="sha384-2kOE+STGAkgemIkUbGtoZ8dJLqfvJ/xzRnimSkQN7viOfwRvWseF7lqcuNXmjwrL" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="position: relative">
        <a class="navbar-brand" href="{{ route('list') }}">Pum-Pum</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor03">
            <div class="lang_wrapp" style="display: flex; position: absolute; right: 270px">
                <a class="nav-link" href="{{ route('locale', ['locale' => 'en']) }}">EN</a>
                <a class="nav-link" href="{{ route('locale', ['locale' => 'ru']) }}">RU</a>
            </div>
            <form class="form-inline my-2 my-lg-0 ml-auto" method="get" action="{{ route('search') }}">
                <input class="form-control mr-sm-2" name="search" type="text" placeholder="{{ __('message.search_placeholder') }}">
                <button class="btn btn-secondary my-2 my-sm-0" type="submit">{{ __('message.search') }}</button>
            </form>
        </div>
    </nav>
    <div class="container">
        <br>
        @yield('content')
    </div>

</body>
</html>
