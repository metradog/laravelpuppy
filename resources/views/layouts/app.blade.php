<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1 ,shrink-to-fit=no" />
    <title>Laravel 11 - @yield('title')</title>    
    <link rel="icon" type="image/x-icon" href="{{asset('favicon.ico')}}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }} " rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.css') }}" />
    @stack('css')
</head>
<body>

    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="{{route('home_index')}}">
          <span class="align-middle">
          <img src="{{asset('img/logo_transparente.png')}}" style="height:100px" />
          </span>
        </a>
            <ul class="sidebar-nav">
					<li class="sidebar-header">
						Administración
					</li>

					<li class="sidebar-item ">
						<a class="sidebar-link" href="{{route('home_index')}}">
                        <i class="align-middle fas fa-home"></i><span class="align-middle">Home</span>
                    </a>
					</li>
                    <li class="sidebar-item ">
						<a class="sidebar-link" href="javascript:void(0);" onclick="cerrarSesion('{{ route('login_salir') }}')" title="Cerrar sesión">
                        <i class="align-middle fas fa-sign-out-alt"></i><span class="align-middle">Cerrar sesión</span>
                    </a>
					</li>
                    <li class="sidebar-header">
						Mantenedores
					</li>
                    <li class="sidebar-item ">
                        <a class="sidebar-link" href=" {{ route('equipos_index') }} " title="Equipos">
                            <i class="align-middle fas fa-list"></i> <span class="align-middle">Equipos</span>
                        </a>
                    </li> 
                    <li class="sidebar-item ">
                        <a class="sidebar-link" href=" {{ route('jugadores_index') }} " title="Jugadores">
                            <i class="align-middle fas fa-users"></i> <span class="align-middle">Jugadores</span>
                        </a>
                    </li> 	
				</ul>
		</nav>
    
    <div class="main">
        <nav class="navbar navbar-expand navbar-light navbar-bg">
            <a class="sidebar-toggle js-sidebar-toggle">
            <i class="hamburger align-self-center"></i>
            </a>
            <div class="navbar-collapse collapse">
                <ul class="navbar-nav navbar-align">
                <li class="nav-item dropdown">
                    <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                        <i class="fas fa-long-arrow-alt-down align-middle"></i>
                    </a>
                    <a class="nav-link d-none d-sm-inline-block">
                        
                    </a>
                    <a class="nav-link d-none d-sm-inline-block">
                    <span class="text-dark">|</span>
                    </a>
                    <a class="nav-link d-none d-sm-inline-block" id="spanreloj">
                  
                    </a>
                    <a class="nav-link d-none d-sm-inline-block">
                    <span class="text-dark">|</span>
                    </a>
                    <a class="nav-link d-none d-sm-inline-block">                        
                     {{  session('perfiles') }}                  

                    <!-- Es más facil como lo deje -->
                    {{-- @session('perfiles') {{  $value }} @endsession --}}

                    </a>
                    <a class="nav-link d-none d-sm-inline-block">
                    <span class="text-dark">|</span>
                    </a>
                    <a class="nav-link d-none d-sm-inline-block">
                     {{ Auth::user()->name }}
                    </a>
                </li>
                </ul>
            </div>
		</nav>  
    <!-- Contenido -->
    @yield('content')
    <!-- Contenido -->
    <footer class="footer">
            <div class="container-fluid">
                <div class="row text-muted">
                    <div class="col-12 text-start">
                        <p class="mb-0">
                            &copy; Todos los derechos reservados | Desarrollado por <a class="text-muted" href="https:www.google.com" target="_blank"  ><strong>DonGraff</strong></a> 
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/sweetalert2.js')}}"></script> 
    <script src="{{asset('js/funciones.js')}}"></script>

    @stack('script')   
</body>
</html>