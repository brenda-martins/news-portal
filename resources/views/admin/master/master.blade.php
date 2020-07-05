<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin/main.css')}}">
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Breaking News | Administrativo</title>
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
                            Brenda
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
                            <a class="nav-link" href="{{ route('admin.category.index')}}">
                                <i class="fa fa-tag fa-lg" aria-hidden="true"></i>
                                Categorias
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class=" nav-link dropdown-toggle">
                                <i class="fa fa-file-text" aria-hidden="true"></i>
                                Postagens
                            </a>
                            <ul class="collapse list-unstyled" id="homeSubmenu" style="margin-left: 5%;">
                                <li>
                                    <a class="nav-link" href="{{ route('admin.post.create')}}">
                                        Adicionar
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="{{route('admin.post.index')}}">
                                        Listar
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="#">
                                        Estatísticas
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
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fa fa-power-off"></i>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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