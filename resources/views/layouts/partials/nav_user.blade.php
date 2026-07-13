<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="{{ url('/') }}">
            <div class="logo-container">
                <div class="logo-icon">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.5 16c-.83 0-1.5-.67-1.5-1.5S5.67 13 6.5 13s1.5.67 1.5 1.5S7.33 16 6.5 16zm11 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zM5 11l1.5-4.5h11L19 11H5z"/>
                    </svg>
                </div>
                <span class="logo-text">
                    <span class="car">CAR</span> <span class="wari">WARI</span>
                </span>
            </div>
        </a>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Menú">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Content -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link @if(Request::is('/')) active @endif" href="{{ url('/') }}">Inicio</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link @if(Request::is('destinations*')) active @endif" href="{{ route('destinations.index') }}">Destinos</a>
                </li>

               

                <li class="nav-item">
                    <a class="nav-link @if(Request::is('servicios*')) active @endif" href="{{ url('/servicios') }}">Servicios</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link @if(Request::is('nosotros')) active @endif" href="{{ url('/nosotros') }}">Nosotros</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link @if(Request::is('contacto')) active @endif" href="{{ url('/contacto') }}">Contacto</a>
                </li>

                <!-- Authentication Links -->
                @auth
                    <li class="nav-item">
                        <a class="nav-link @if(Request::is('reservas*')) active @endif" href="{{ route('reservas.index') }}">Mis Reservas</a>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
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
                        <a class="btn-login" href="{{ route('login.form') }}">Iniciar Sesión</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn-reservar" href="{{ route('register.form') }}">Reservar</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>