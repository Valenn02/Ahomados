<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema Ventas Laravel Vue Js- Compartiendocodigos">
    <meta name="author" content="compartiendocodigos.net">
    <meta name="keyword" content="Sistema ventas Laravel Vue Js, Sistema compras Laravel Vue Js">
    <link rel="shortcut icon" href="img/Logo-Lananita.png">
    <meta name="userId" content="{{ Auth::check() ? Auth::user()->id : ''}}">
    <title>Sistema POS</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js">
    <!-- Icons -->
    <link href="css/plantilla.css" rel="stylesheet">
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
    <div id="app">
    <header class="app-header navbar">
        <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button">
          <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="nav navbar-nav ml-auto mr-3">
            <notification :notifications="notifications"></notification>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img src="img/logoahuma2.jpg" class="img-avatar" alt="Fotografia">
                    <span class="d-md-down-none">{{Auth::user()->usuario}}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header text-center">
                        <strong>Cuenta</strong>
                    </div>
                    
                    <a class="dropdown-item" href="#" @click="menu=17">
                    <i class="fa fa-user-circle"></i> Perfil</a>


                    <!--@if(Auth::check())
                        @if(Auth::user()->idrol == 1)
                            <a class="dropdown-item" href="#" @click="menu=21">
                            <i class="fa fa-wrench"></i> Configuración</a>
                        @endif
                    @endif -->

                    <a class="dropdown-item" href="{{ route('logout') }}" 
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-lock"></i> Cerrar sesión</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>

                </div>
            </li>
        </ul>
    </header>

    <div class="app-body">
        
        @if(Auth::check())
            @if (Auth::user()->idrol == 1)
                @include('plantilla.sidebaradministrador')
            @elseif (Auth::user()->idrol == 2)
                @include('plantilla.sidebarvendedor')
            @else

            @endif

        @endif
        <!-- Contenido Principal -->
        @yield('contenido')
        <!-- /Fin del contenido principal -->
    </div>   

    
    </div>
    <!-- <footer class="app-footer">
        <span><a href="#" target="_blank">365 Group</a> &copy; 2023</span>
        <span class="ml-auto">Version 0.0.1</span>
    </footer>
     -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
    $(document).ready(function() {
    const dropdownToggles = $('.nav-dropdown-toggle');
    const allDropdowns = $('.nav-dropdown'); // Todos los elementos con clase "nav-dropdown"
    dropdownToggles.on('click', function() {
        const clickedDropdown = $(this).closest('.nav-dropdown');
        allDropdowns.not(clickedDropdown).removeClass('open');
        clickedDropdown.toggleClass('open');
        console.log("Menú seleccionado:", $(this).text().trim());
    });
    allDropdowns.on('click', function(event) {
        event.stopPropagation(); 
    });
    //   // Cierra todos los menús desplegables al hacer clic en cualquier otra parte de la pagina
    //   $(document).on('click', function(event) {
    //     if (!$(event.target).closest('.nav-dropdown').length) {
    //       allDropdowns.removeClass('open');
    //     }
    //   });
    });
    </script>

    <script src="js/app.js"></script>
    <script src="js/plantilla.js"></script>
    <!-- Agrega esta línea en tu plantilla de Laravel -->
    <script>
        window.userData = {
            rol: {{ Auth::check() ? Auth::user()->idrol : null }}
        };
    </script>

</body>

</html>