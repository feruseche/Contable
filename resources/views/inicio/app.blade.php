<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} | www.contable.co.ve</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/AdminLTE.css') }}">

    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('css/_all-skins.min.css') }}">
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/cafetin.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

    <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
    <!--<script src="https://cdn.jsdelivr.net/npm/vue"></script>-->

  <!-- Font Awesome 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"> -->
  <!-- Ionicons 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('plugins/iCheck/flat/blue.css')}}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{asset('plugins/morris/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{asset('plugins/datepicker/datepicker3.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
  <link rel="stylesheet" href="{{asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.css')}}">
  <script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js')}}"></script>
  <script src="{{asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.js')}}"></script>

  <script src="/js/vue.min.js"></script>
  </head>

  <body class="hold-transition skin-blue-light">
      <?php $user=Auth::user()->id; 
            $userVista=Auth::user()->vista;
      ?>
      <div class="wrapper">

        <header class="main-header">

          <!-- Logo -->
          <a href="/" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>APP</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>CONTABLE</b></span>
          </a>

          <!-- Header Navbar: style can be found in header.less -->
          <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
              <span class="sr-only">Navegación</span>
            </a>
            
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
              <ul class="nav navbar-nav">

                <li class="dropdown notifications-menu">
                  <a href="#">
                  <i class="fa fa-cart-plus"></i>
                  <span class="label label-warning">{{ $user }}</span>
                  </a>
                </li>

                <li class="dropdown tasks-menu">
                  <a href="#">
                    <i class="fa fa-bell-o"></i>
                    <span class="label label-info">{{ $user }}</span>
                  </a>
                </li>

                <li class="dropdown messages-menu">
                  <a href="#">
                    <i class="fa fa-newspaper-o"></i>
                    <span class="label label-success">{{ $user }}</span>
                  </a>
                </li>

                <li class="dropdown messages-menu">
                  <a href="#">
                    <i class="fa fa-book"></i>
                    <span class="label label-success">{{ $user }}</span>
                  </a>
                </li>

                <li class="dropdown user user-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    @guest
                      <img src="img/guest.jpg" class="user-image" alt="User Image">
                    @else
                      <?php
                        $user=Auth::user()->id;
                        $ruta_img = "img/usuarios/u".$user.".jpg";
                        if(file_exists($ruta_img)){$ruta_foto = $ruta_img;}else{$ruta_foto = "img/usuarios/u0.jpg";}
                      ?>
                      <img src="{{ $ruta_foto }}" class="user-image" alt="User Image">
                    @endguest
                    <span class="hidden-xs">
                      @guest
                        Invitado
                      @else
                        {{ Auth::user()->name }}
                        <small>
                          @if(Auth::user()->nivel==1)
                             (Administrador)
                          @else
                            @if(Auth::user()->nivel==2)
                              (Supervisor)
                            @else
                              @if(Auth::user()->nivel==3)
                                (Operador)
                              @endif
                            @endif
                          @endif
                        </small>
                      @endguest
                    </span>
                  </a>
                  <ul class="dropdown-menu">              
                    <li class="user-header">
                      @guest
                        <img src="img/guest.jpg" class="img-circle" alt="User Image">
                        <p><small>Invitado</small></p>
                      @else
                        <img src="{{ $ruta_foto }}" class='img-circle' alt='User Image'>
                        <p>{{ Auth::user()->name }}<small>{{ Auth::user()->email }}</small></p>
                      @endguest
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                      @guest
                        <div class="pull-left">
                          <a href="login" class="btn btn-default btn-flat">Login</a>
                        </div>
                      @else
                        <div class="pull-right">
                          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                      @endguest
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>

        </header>

        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
          <section class="sidebar">
            <ul class="sidebar-menu">
              <li class="treeview active">
                <a href="#">
                  <i class="fa fa-database"></i>
                  <span>Archivos</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>                      
                <ul class="treeview-menu">
                  <li>
                    @if($userVista=="2")
                      <a href="empresas">
                    @else
                      <a href="empresas.listado">
                    @endif
                    <i class="fa fa-newspaper-o"></i><span>Empresas</span>
                    </a>
                  </li>
                  <li>
                    @if($userVista=="2")
                      <a href="terceros">
                    @else
                      <a href="terceros.listado">
                    @endif
                    <i class="fa fa-newspaper-o"></i><span>Terceros</span>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users" aria-hidden="true"></i> <span>Prestaciones</span>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users" aria-hidden="true"></i> <span>Vacaciones</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="treeview active">
                <a href="#">
                  <i class="fa fa-cogs"></i> <span>Configuración</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="#"><i class="fa fa-lock"></i>Opciones Avanzadas</a></li>
                </ul>
              </li>
              <li>  
                <a href="#">
                  <i class="fa fa-info-circle"></i> <span>Acerca...</span>
                  <small class="label pull-right bg-yellow">FAF</small>
                </a>
              </li>
            </ul>
          </section>
        </aside>

        <!--Contenido-->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
              
                @yield('contenido')
        
        </div><!-- /.content-wrapper -->

        <!--Fin-Contenido-->
        <footer class="main-footer">
          <div class="pull-right hidden-xs">
            <b>Versión</b> 2018
          </div>
          <strong>Copyright &copy; 2018-2028 <a href="www.nks.com.ve">NKS Software</a></strong>
        </footer>
    </div>  <!-- fin del wrapper -->

    <!-- AdminLTE App -->
    <script src="js/app.min.js"></script>
    <script src="js/printThis.js"></script>    
    @stack('scripts')
  </body>

</html>
