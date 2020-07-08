<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin/main.css')}}">
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Breaking News | Administrativo</title>

    <style>
        .message {
            display: block;
            padding: 10px;
            border: 2px solid #555555;
            border-left-width: 32px;
            -webkit-border-radius: 6px;
            -moz-border-radius: 6px;
            border-radius: 6px;
            margin-bottom: 20px;

            font-size: 0.875em;
            font-weight: 600;
        }

        .message.error {
            color: #ee5253;
            border-color: #ee5253;
        }
    </style>

</head>

<body>
    <div class="container-fluid">
        <div class="row">

            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
                <div class="sidebar-header">
                    <div class="user-pic">
                        <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg" alt="User picture">
                    </div>
                    <div class="user-info">
                        <span class="user-name">
                            {{Auth::user()->name}}
                        </span>
                    </div>
                </div>


                <div class="sidebar-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fa fa-home fa-lg" aria-hidden="true"></i>
                                Painel
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class=" nav-link dropdown-toggle">
                                <i class="fa fa-file-text" aria-hidden="true"></i>
                                Postagens
                            </a>
                            <ul class="collapse list-unstyled" id="homeSubmenu" style="margin-left: 5%;">
                                <li>
                                    <a class="nav-link" href="{{ route('author.post.create')}}">
                                        Adicionar
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="{{route('author.post.list')}}">
                                        Listar
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fa fa-picture-o" aria-hidden="true"></i>
                                Galeria
                            </a>
                        </li>




                    </ul>
                </div>

                <div class="sidebar-footer pt-3">
                    <a href="#">
                        <i class="fa fa-bell"></i>
                        <span class="badge badge-pill badge-warning notification">3</span>
                    </a>
                    <a href="#">
                        <i class="fa fa-envelope"></i>
                        <span class="badge badge-pill badge-success notification">7</span>
                    </a>
                    <a href="#">
                        <i class="fa fa-cog"></i>
                        <span class="badge-sonar"></span>
                    </a>
                    <a href="{{ route('author.logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fa fa-power-off"></i>

                        <form id="logout-form" action="{{ route('author.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </a>
                </div>
            </nav>


            <div class="col">

                @yield('content')
            </div>

        </div>
    </div>

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    @yield('scripts')
</body>

</html>