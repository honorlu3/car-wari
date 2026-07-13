<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Turismo Ayacucho')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <!-- 🌄 NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('user.welcome') }}">
                <i class="bi bi-airplane"></i> Turismo Ayacucho
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('user.welcome') ? 'active' : '' }}" href="{{ route('user.welcome') }}">Inicio</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('destinations.index') ? 'active' : '' }}" href="{{ route('destinations.index') }}">Destinos</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('user.reservas.index') ? 'active' : '' }}" href="{{ route('user.reservas.index') }}">Mis Reservas</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contacto') ? 'active' : '' }}" href="{{ route('contacto') }}">Contacto</a>
                    </li>

                    <!-- Menú del usuario autenticado -->
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('user.profile') }}">Mi Perfil</a></li>
                            <li>
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                   <i class="bi bi-box-arrow-right"></i> Cerrar sesión
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login.form') }}">Iniciar sesión</a>
                    </li>
                    <li class="nav-item"><a href="{{ route('register.form') }}" class="nav-link">Registro</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- 🧩 CONTENIDO -->
    <div class="container my-4">
        @yield('content')
    </div>

    <!-- ⚙️ FOOTER -->
    <footer class="bg-light text-center py-3 mt-5 border-top">
        <small>© {{ date('Y') }} Turismo Ayacucho — Todos los derechos reservados</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
