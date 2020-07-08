<!DOCTYPE html>
<html lang="en">

<head>
    <!-- background-color:rgb(52, 58, 64); -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/site/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.tiny.cloud/1/82bmftj7j05pf47ku4ygtxfofvka9eon163ecel5xatsaxxm/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Breaking News</title>
</head>

<body>

    <header>
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col title">
                        <h3>Breaking news</h3>
                    </div>
                    <div class="col-8">
                        <nav>
                            <ul class="social_networks">
                                <li>
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                </li>
                                <li>
                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                </li>
                                <li>
                                    <i class="fa fa-youtube-play" aria-hidden="true"></i>
                                </li>
                                <li>
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                </li>
                            </ul>
                            <div class="sign">
                                <div class="login">
                                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                                    <a href="">Login</a>
                                </div>
                                <div class="register">
                                    <a href="">Assine</a>
                                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                                </div>

                            </div>

                        </nav>
                    </div>
                    <div class="col date-atual">
                        <h3> {{ date('D/M/Y') }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-middle">
            <div class="container">
                <div class="row">
                    <p class="logo1">
                        breaking
                    </p>
                    <p class="logo2">
                        news
                    </p>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="container">
                <div class="row">
                    <nav class="navbar navbar-expand-lg navbar-dark">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>


                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('web.index') }}">Home</a>
                                </li>
                                <!-- <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Páginas
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </li> -->
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Política</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Economia</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Cultura</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Ciência</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Tecnologia</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Esportes</a>
                                </li>
                            </ul>
                        </div>

                    </nav>
                </div>
            </div>
        </div>
    </header>



    @yield('content')


    <footer class="text-muted">
        <div class="container">
            <p class="float-right">
                <a href="#">
                    <i class="fa fa-arrow-up fa-3x" aria-hidden="true"></i>

                </a>
            </p>
            <div class="row">
                <p class="logo1">
                    &copy breaking
                </p>

                <p class="logo2">
                    news
                </p>


            </div>
        </div>
    </footer>

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    @yield('scripts')
</body>

</html>