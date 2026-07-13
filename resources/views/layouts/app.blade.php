<!DOCTYPE html>
<html lang="es">
    @include('layouts.partials.head')

<body>
    
    @include('layouts.partials.nav_user')

   <!--   @ include('layouts.partials.alerts')

   Contenido dinámico -->
    <main class="mt-0">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('layouts.partials.footer')

    <!-- Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

@yield('scripts')


<!-- Botón Flotante WhatsApp -->
<a href="https://wa.me/51999999999?text=Hola,%20quiero%20información%20sobre%20los%20tours" 
   target="_blank" 
   class="whatsapp-float" 
   aria-label="Contactar por WhatsApp">
    <i class="bi bi-whatsapp"></i>
    <span class="whatsapp-tooltip">¡Escríbenos!</span>
</a>


</body>
</html>
