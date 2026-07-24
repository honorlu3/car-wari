<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="footer-grid">
            
            <!-- Columna 1: Logo y Descripción -->
            <div class="footer-col">
                <div class="footer-logo">
                    <div class="logo-icon">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.5 16c-.83 0-1.5-.67-1.5-1.5S5.67 13 6.5 13s1.5.67 1.5 1.5S7.33 16 6.5 16zm11 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zM5 11l1.5-4.5h11L19 11H5z"/>
                        </svg>
                    </div>
                    <span class="logo-text">
                        <span class="car">CAR</span> <span class="wari">WARI</span>
                    </span>
                </div>
                <p class="footer-description">
                    Tu compañero de aventura en Ayacucho. Transporte turístico privado con los más altos estándares de comodidad y seguridad.
                </p>
                <div class="social-icons">
                    <a href="#" class="social-link" aria-label="Instagram">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="#" class="social-link" aria-label="Facebook">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="#" class="social-link" aria-label="YouTube">
                        <i class="bi bi-youtube"></i>
                    </a>
                </div>
            </div>

            <!-- Columna 2: Navegación -->
            <div class="footer-col">
                <h4 class="footer-title">Navegación</h4>
                <ul class="footer-links">
                    <li><a href="{{ url('/') }}">Inicio</a></li>
                    <li><a href="{{ route('destinations.index') }}">Destinos</a></li>
                    <li><a href="{{ url('/vehiculos') }}">Vehículos</a></li>
                    <li><a href="{{ url('/servicios') }}">Servicios</a></li>
                    <li><a href="{{ url('/nosotros') }}">Nosotros</a></li>
                    <li><a href="{{ url('/contacto') }}">Contacto</a></li>
                </ul>
            </div>

            <!-- Columna 3: Servicios -->
            <div class="footer-col">
                <h4 class="footer-title">Servicios</h4>
                <ul class="footer-links">
                    <li><a href="#">Tours Privados</a></li>
                    <li><a href="#">Traslado Aeropuerto</a></li>
                    <li><a href="#">City Tour Ayacucho</a></li>
                    <li><a href="#">Tours Arqueológicos</a></li>
                    <li><a href="#">Excursiones</a></li>
                    <li><a href="#">Transporte Corporativo</a></li>
                </ul>
            </div>

            <!-- Columna 4: Contacto -->
            <div class="footer-col">
                <h4 class="footer-title">Contacto</h4>
                <ul class="footer-contact">
                    <li>
                        <i class="bi bi-geo-alt"></i>
                        <span>Av. Mariscal Cáceres s/n , Ayacucho, Perú</span>
                    </li>
                    <li>
                        <i class="bi bi-telephone"></i>
                        <span>+51 916 466 009</span>
                    </li>
                    <li>
                        <i class="bi bi-envelope"></i>
                        <span>transportescarwari@gmail.com</span>
                    </li>
                </ul>
                <div class="schedule-box">
                    <h5 class="schedule-title">Horario de atención</h5>
                    <p class="schedule-text">Lun – Dom: 6:00 AM – 10:00 PM</p>
                </div>
            </div>

        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="footer-bottom-content">
                <p class="copyright">
                    © {{ date('Y') }} Car Wari. Todos los derechos reservados. Ayacucho, Perú.
                </p>
                <div class="footer-bottom-links">
                    <a href="{{ url('/politicas') }}">Privacidad</a>
                    <a href="{{ url('/terminos')}}">Términos</a>
                    <a href="#">Cookies</a>
                </div>
            </div>
        </div>
    </div>
</footer>