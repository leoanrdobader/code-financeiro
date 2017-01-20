<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel *****') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <header>
            @if (Auth::check())

                <?php $menuConfig = [
                        'name'=>Auth::user()->name,
                        'menus'=>[
                                ['name' => 'Banco', 'url' => route('admin.banks.index')],
//                                ['name' => 'Contas a pagar', 'url' => '/teste', 'dropdownId'=> 'teste'],
//                                ['name' => 'Contas a receber', 'url' => '/teste1']
                        ],
                     /*   'menusDropdown'=>[
                                [
                                        'id'=>'teste',
                                        'items'=>[
                                                ['name'=>'Listar contas', 'url'=>'/listar'],
                                                ['name'=>'Criar Conta', 'url'=>'/criar'],
                                        ]
                                ]
                        ],*/
                        'urlLogout'=>env('URL_ADMIN_LOGOUT'),
                        'csrftoken'=>csrf_token()
                ];
                ?>
                <admin-menu :config="{{ json_encode($menuConfig) }}"></admin-menu>
            @endif
        </header>
        <main>
            @yield('content')
        </main>
        <footer class="page-footer">
            <div class="footer-copyright">
                <div class="container center-align">
                    © {{ date('Y') }} - <a class="green-text text-lighten-4" href="javascritpt.void(0);">Leonardo</a>
                </div>
            </div>
        </footer>
    </div>



       {{-- <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ env('URL_ADMIN_LOGIN') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ env('URL_ADMIN_LOGOUT') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>--}}

    <!-- Scripts -->
    <script src="{{ asset('build/admin.bundle.js') }}"></script>
</body>
</html>
