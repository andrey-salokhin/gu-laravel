<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">Новостной блог</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Главная</a>
                </li>
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('account.index') }}">Личный кабинет</a>
                        </li>
                        @if(\Illuminate\Support\Facades\Auth::user()->is_admin === true)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('users.index') }}">Админка</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.parser') }}">Парсер</a>
                            </li>
                        @endif
                    @else

                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link">Войти</a>
                        </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="nav-link">Зарегистрироваться</a>
                            </li>
                        @endif
                    @endif
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('news.index') }}">Новости</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('categories.index') }}">Категории</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
