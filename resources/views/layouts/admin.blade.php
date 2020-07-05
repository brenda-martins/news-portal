<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Dashboard Template · Bootstrap</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  <style>
    .featured-image {
      display: flex;
      flex-direction: column;
      width: 90%;
      max-width: 600px;
      height: 380px;
      background-color: rgb(220,220,220);
      margin: auto;
    }

    .featured-image img {
      width: 100%;
      height: 100%;
      object-fit: contain;
    }

    .featured-image input[type=file] {
      padding: 10px;
      background: #2d2d2d;
      width: 100%;
    }

    /*--------------------sidebar-header----------------------*/

    .sidebar-header {
      padding: 20px;
      overflow: hidden;
    }

    .sidebar-header .user-pic {
      float: left;
      width: 60px;
      padding: 2px;
      border-radius: 12px;
      margin-right: 15px;
      overflow: hidden;
    }

    .sidebar-header .user-pic img {
      object-fit: cover;
      height: 100%;
      width: 100%;
    }

    .sidebar-header .user-info {
      float: left;
    }

    .sidebar-header .user-info>span {
      display: block;
    }

    .sidebar-header .user-info .user-role {
      font-size: 12px;
    }

    .sidebar-header .user-info .user-status {
      font-size: 11px;
      margin-top: 4px;
    }

    .sidebar-header .user-info .user-status i {
      font-size: 8px;
      margin-right: 4px;
      color: #5cb85c;
    }


    /*--------------------------side-footer------------------------------*/

    .sidebar-footer {
      position: absolute;
      width: 100%;
      bottom: 0;
      display: flex;
    }

    .sidebar-footer>a {
      flex-grow: 1;
      text-align: center;
      height: 30px;
      line-height: 30px;
      position: relative;
    }

    .sidebar-footer>a .notification {
      position: absolute;
      top: 0;
    }

    .badge-sonar {
      display: inline-block;
      background: #980303;
      border-radius: 50%;
      height: 8px;
      width: 8px;
      position: absolute;
      top: 0;
    }

    .badge-sonar:after {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      border: 2px solid #980303;
      opacity: 0;
      border-radius: 50%;
      width: 100%;
      height: 100%;
      animation: sonar 1.5s infinite;
    }
  </style>
</head>

<body>
 
  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">

        <div class="sidebar-header">
          <div class="user-pic">
            <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg" alt="User picture">
          </div>
          <div class="user-info">
            <span class="user-name">
              {{ Auth::user()->name }}
            </span>
            <span class="user-role">Administrator</span>
            <span class="user-status">
              <i class="fa fa-circle"></i>
              <span>Online</span>
            </span>
          </div>
        </div>


        <div class="sidebar-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="fas fa-home"></i>
                Painel
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('admin.category.index')}}">
                Categorias
              </a>
            </li>


            <li class="nav-item">
              <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class=" nav-link dropdown-toggle">
                Postagens
              </a>
              <ul class="collapse list-unstyled" id="homeSubmenu" style="margin-left: 5%;">
                <li>
                  <a class="nav-link" href="{{ route('admin.post.create') }}">
                    Adicionar
                  </a>
                </li>
                <li>
                  <a class="nav-link" href="#">
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
                <span data-feather="users"></span>
                Customers
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="bar-chart-2"></span>
                Reports
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="layers"></span>
                Integrations
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
          <a href="#">
            <i class="fa fa-power-off"></i>
          </a>
        </div>
      </nav>


      @yield('content')
    </div>
  </div>


  <script src="{{ asset('js/jquery.js') }}"></script>
  <script src="{{ asset('js/bootstrap.js') }}"></script>
  @yield('scripts')
</body>

</html>